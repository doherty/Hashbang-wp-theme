#!/usr/bin/env perl
use strict;
use warnings;
use v5.16.0;

use Path::Tiny qw(path);
use Module::Load qw(load);
use File::Next;
use List::MoreUtils qw(any);

my $did_stuff = 0;
END { say 'DONE' if $did_stuff }


sub generate_minifier {
    my $type = shift;

    my $handler = +{
        js  => { module => 'JavaScript::Minifier::XS',  export => [qw/minify/] },
        css => { module => 'CSS::Minifier::XS',         export => [qw/minify/] },
    }->{$type};
    load $handler->{module}, @{ $handler->{export} };

    return sub {
        my $file = shift;
        my $min = $file =~ s{\.${type}\z}{.min.${type}}r;
        if ($min eq $file) {
            warn "$min eq $file, so something went wrong.";
            return;
        }

        print "Minifying: $file -> $min...";
        path($min)->spew( minify(path($file)->slurp) . "\n" );
        say ' OK';
    };
}

sub minify {
    my $type = shift;

    my $iter = File::Next::files({
        file_filter => sub { m{ \. $type \z }x and not m{ \. min \. $type \z }x },
    }, '.');
    my $minifier = generate_minifier($type);

    FILE:
    while (my $file = $iter->()) {
        $minifier->($file);
    }
    $did_stuff++;
}

my %known_actions = (
    css => \&minify,
    js  => \&minify,
    all => sub { @ARGV = qw(css js); },
);

die sprintf "Need an action to perform\nKnown actions: %s\n",
    join ' ' => sort keys %known_actions
    unless @ARGV;

STDOUT->autoflush(1);
ACTION:
while ( my $action = lc( shift @ARGV || '') ) {
    my $code = $known_actions{$action} || do {
        warn "Unknown action: $action";
        next ACTION;
    };
    $code->($action);
}

# $ find . -path ./.git -prune -o -print | grep -vP '(?<!min)\.(j|cs)s$' | grep -vF -e LICENSE -e README.mkdn
