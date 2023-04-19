# Sendcloud Dynamic Checkout API - PHP Example Project

This repository hosts a simple PHP app that lists the  delivery methods associated with your specified Sendcloud Dynamic Checkout Configuration 


## Documentation

[Sendcloud Dynamic Checkout API Documentation](https://api.sendcloud.dev/docs/sendcloud-public-api/dynamic-checkout)


## Environment Variables

To run this project, you will need to add the following environment variables to your keys.env file 

`API_KEY` : Your Sendcloud API Public Key

`SECRET_KEY` : Your Sendcloud API Private Key

`CHECKOUTID` : The ID of the Dynamic Checkout Configuration you are testing
## Run in Docker

Clone the project

```bash
  git clone https://github.com/AlexLamond/sendcloud-checkout-php-example
```

Go to the project directory and start the server

```bash
  docker compose -f "docker-compose.yaml" up -d --build
```

[Launch the server](http://localhost:8080)
## Run Locally


Clone the project

```bash
  git clone https://github.com/AlexLamond/sendcloud-checkout-php-example
```

Go to the web directory

```bash
  cd app/public
```

Install the dependancies

```bash
  composer install
  ```

  Run the local PHP server

  ```bash
    php -S 127.0.0.1:8070
```

[Launch the server](http://localhost:8080)
## Contributing

Contributions are welcome, please add clear descriptions of changes made
Pull requests should be committed with semantic naming