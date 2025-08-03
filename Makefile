COPY = cp
RM_FILE = rm -f
RM_DIR = rm -rf

ifeq ($(OS),Windows_NT)
    SHELL = cmd.exe
    COPY = copy
    RM_FILE = del /F /Q
    RM_DIR = rmdir /S /Q
endif

PHP = php
ARTISAN = $(PHP) artisan

.PHONY: all install setup serve migrate key clean help

all: help

install:
	@echo "Installing Composer dependencies..."
	@composer install

setup: .env key
	@echo "Initial setup complete."
	@echo "Running database migrations..."
	@$(ARTISAN) migrate --force
	@echo "Setup finished. You can now run 'make serve' to start the application."

.env:
ifeq ($(OS),Windows_NT)
	@if not exist .env ($(COPY) .env.example .env)
else
	@test -f .env || $(COPY) .env.example .env
endif

key:
	@echo "Generating application key..."
	@$(ARTISAN) key:generate

migrate:
	@echo "Running database migrations..."
	@$(ARTISAN) migrate

serve:
	@echo "Starting Laravel development server on http://127.0.0.1:8000"
	@$(ARTISAN) serve

clean:
	@echo "Cleaning project..."
	-@$(RM_DIR) vendor
	-@$(RM_FILE) .env
	@echo "Project cleaned."

help:
	@echo "Available make commands:"
	@echo "  make install    - Install project dependencies with Composer."
	@echo "  make setup      - Run initial setup (create .env, generate key, migrate)."
	@echo "  make serve      - Start the development server."
	@echo "  make migrate    - Run database migrations."
	@echo "  make key        - Generate a new application key."
	@echo "  make clean      - Remove vendor directory and .env file."
