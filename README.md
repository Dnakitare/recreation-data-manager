# Recreation Data Manager

A simple Laravel application to fetch, transform, and store facilities data from the Recreation Information Database (RIDB) API.

## Features

- Fetch facilities data from the RIDB API
- Store facilities data in a PostgreSQL database
- Save GEOJSON data for spatial information

## Requirements

- Docker
- Laravel Sail
- PostgreSQL

## Setup

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/recreation-data-manager.git
    cd recreation-data-manager
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Copy the example environment file and configure it:
    ```sh
    cp .env.example .env
    ```

4. Update `.env` with your database and API settings.

5. Start Docker containers:
    ```sh
    ./vendor/bin/sail up
    ```

6. Run migrations:
    ```sh
    ./vendor/bin/sail artisan migrate
    ```

7. Fetch facilities data:
    Access `http://localhost/fetch-facilities`

## Usage

- Access the facilities data at `http://localhost/facilities`

## License

This project is open-source and available under the [MIT License](LICENSE).