<?php
namespace Deployer;

require 'recipe/laravel.php';
// require 'recipe/npm.php';

// Project name
set('application', 'Voyage-web');

// Project repository
set('repository', 'git@github.com:ics3-1projects/Voyage-web.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('188.166.89.126')
    ->user('deployer')
    ->set('deploy_path', '/var/www/voyage.com/html/Voyage-web');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// after('deploy:update_code', 'npm:install');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

desc('Install passport');
task('artisan:passport:install', function () {
    run('{{bin/php}} {{release_path}}/artisan passport:install');
});

desc('Install voyager admin');
task('artisan:voyager:install', function () {
    run('{{bin/php}} {{release_path}}/artisan voyager:install --force');
});

// build npm
task('npm:run:prod', function () {
    run("cd {{release_path}} && npm install && npm run prod");
});

// install extensions and migrate db
task('extensions', [
    'artisan:migrate',
    'artisan:passport:install',
    'artisan:voyager:install',
    'npm:run:prod'
]);

// Migrate database before symlink new release.

before('deploy:symlink', 'extensions');
