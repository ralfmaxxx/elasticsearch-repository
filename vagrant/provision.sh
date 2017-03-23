#!/usr/bin/env bash

. /vagrant/vagrant/services/common.sh
. /vagrant/vagrant/services/php.sh

VAGRANT_USER_HOME_DIR='/vagrant'

PHP_MODULES=(
    'php7.0-cli'
    'php7.0-xml'
    'php7.0-mbstring'
    'php7.1-cli'
    'php7.1-xml'
    'php7.1-mbstring'
)

add_php_repository &&
update_repositories &&
install_git_and_zip &&
set_home_directory_for_vagrant_user &&

install_php &&
install_php_composer
