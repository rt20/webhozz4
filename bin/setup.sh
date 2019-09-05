#!/bin/bash

# Sets up this repository on initial install

# Check to make sure script is being run from the right directory
if [ ! -f composer.json ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

fancy_echo () {
    echo -e "\n------------------------------"
    echo "$1"
    echo -e "------------------------------\n"
}

fancy_echo "Composer install..."
composer install

fancy_echo "Set up .env..."
cp .env.example .env

fancy_echo "Generate key..."
php artisan key:generate

fancy_echo "Install NPM dependencies..."
npm install

fancy_echo "Run Laravel Mix..."
npm run dev

fancy_echo "Setup complete!"