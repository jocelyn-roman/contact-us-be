# Contact Us
Provides an initial setup for Drupal projects using Lando & Docker.

This project has a custom module to create a custom Rest API
These are the endpoints available:

* /myapi/form/validate
 - POST: This endpoint validates the email and phone_number.

 Example of body: 
 {
    "phone_number": "123457690",
    "email": "jocyroman@gmail.com"
  }

Response:
- 200: Fields are correct and returns a Suceesful message.
- 400: Fields are not correct and returns an array of erros.


# Composer-enabled Drupal template

This is Pantheon's recommended starting point for forking new [Drupal](https://www.drupal.org/) upstreams
that work with the Platform's Integrated Composer build process. It is also the
Platform's standard Drupal 9 upstream.

Unlike with earlier Pantheon upstreams, files such as Drupal Core that you are
unlikely to adjust while building sites are not in the main branch of the 
repository. Instead, they are referenced as dependencies that are installed by
Composer.

For more information and detailed installation guides, please visit the
Integrated Composer Pantheon documentation: https://pantheon.io/docs/integrated-composer

## Contributing

Contributions are welcome in the form of GitHub pull requests. However, the
`pantheon-upstreams/drupal-composer-managed` repository is a mirror that does not
directly accept pull requests.

Instead, to propose a change, please fork [pantheon-systems/drupal-composer-managed](https://github.com/pantheon-systems/drupal-composer-managed)
and submit a PR to that repository.
