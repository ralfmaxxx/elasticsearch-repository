#!/usr/bin/env bash

function update_repositories()
{
    apt-get update
}

function install_git_and_zip()
{
    apt-get install -y git zip unzip
}

function set_home_directory_for_vagrant_user()
{
    echo "cd $VAGRANT_USER_HOME_DIR" > /home/vagrant/.bashrc
}
