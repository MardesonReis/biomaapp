<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '64e19131a9d2b21f08f7d76bb2dab4ecad54aded',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '64e19131a9d2b21f08f7d76bb2dab4ecad54aded',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'heroku/heroku-buildpack-php' => array(
            'pretty_version' => 'v224',
            'version' => '224.0.0.0',
            'reference' => '2df7a440119b0c9468fbace658eb0d528b4d6971',
            'type' => 'library',
            'install_path' => __DIR__ . '/../heroku/heroku-buildpack-php',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'monolog/monolog' => array(
            'pretty_version' => '1.27.1',
            'version' => '1.27.1.0',
            'reference' => '904713c5929655dc9b97288b69cfeedad610c9a1',
            'type' => 'library',
            'install_path' => __DIR__ . '/../monolog/monolog',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'pimple/pimple' => array(
            'pretty_version' => 'v3.5.0',
            'version' => '3.5.0.0',
            'reference' => 'a94b3a4db7fb774b3d78dad2315ddc07629e1bed',
            'type' => 'library',
            'install_path' => __DIR__ . '/../pimple/pimple',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/container' => array(
            'pretty_version' => '2.0.2',
            'version' => '2.0.2.0',
            'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/log' => array(
            'pretty_version' => '1.1.4',
            'version' => '1.1.4.0',
            'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0.0',
                1 => '1.0|2.0',
            ),
        ),
        'silex/api' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v2.3.0',
            ),
        ),
        'silex/providers' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v2.3.0',
            ),
        ),
        'silex/silex' => array(
            'pretty_version' => 'v2.3.0',
            'version' => '2.3.0.0',
            'reference' => '6bc31c1b8c4ef614a7115320fd2d3b958032f131',
            'type' => 'library',
            'install_path' => __DIR__ . '/../silex/silex',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/debug' => array(
            'pretty_version' => 'v4.4.44',
            'version' => '4.4.44.0',
            'reference' => '1a692492190773c5310bc7877cb590c04c2f05be',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/debug',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => array(
            'pretty_version' => 'v3.1.1',
            'version' => '3.1.1.0',
            'reference' => '07f1b9cc2ffee6aaafcf4b710fbc38ff736bd918',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/deprecation-contracts',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/error-handler' => array(
            'pretty_version' => 'v4.4.44',
            'version' => '4.4.44.0',
            'reference' => 'be731658121ef2d8be88f3a1ec938148a9237291',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/error-handler',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => array(
            'pretty_version' => 'v4.4.44',
            'version' => '4.4.44.0',
            'reference' => '1e866e9e5c1b22168e0ce5f0b467f19bba61266a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/event-dispatcher',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => array(
            'pretty_version' => 'v1.1.13',
            'version' => '1.1.13.0',
            'reference' => '1d5cd762abaa6b2a4169d3e77610193a7157129e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/event-dispatcher-contracts',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.1',
            ),
        ),
        'symfony/http-client-contracts' => array(
            'pretty_version' => 'v2.5.2',
            'version' => '2.5.2.0',
            'reference' => 'ba6a9f0e8f3edd190520ee3b9a958596b6ca2e70',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/http-client-contracts',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/http-foundation' => array(
            'pretty_version' => 'v4.4.45',
            'version' => '4.4.45.0',
            'reference' => 'b2f2e3cb66349d89cb46c939cea03c62ad71cf00',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/http-foundation',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/http-kernel' => array(
            'pretty_version' => 'v4.4.45',
            'version' => '4.4.45.0',
            'reference' => '4f2d38e9a3c6997ea0886ede5aaf337dfd0fc938',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/http-kernel',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/mime' => array(
            'pretty_version' => 'v5.4.12',
            'version' => '5.4.12.0',
            'reference' => '03876e9c5a36f5b45e7d9a381edda5421eff8a90',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/mime',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => '6fd1b9a79f6e3cf65f9e679b23af304cd9e010d4',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-ctype',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => '59a8d271f00dd0e4c2e518104cc7963f655a1aa8',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-idn',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => '219aa369ceff116e673852dce47c3a41794c14bd',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-normalizer',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => '9344f9cb97f3b19424af1a21a3b0e75b0a7d8d7e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-php72' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => 'bf44a9fd41feaac72b074de600314a93e2ae78e2',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php72',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-php73' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => 'e440d35fa0286f77fb45b79a03fedbeda9307e85',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php73',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => array(
            'pretty_version' => 'v1.26.0',
            'version' => '1.26.0.0',
            'reference' => 'cfa0ae98841b9e461207c13ab093d76b0fa7bace',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php80',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/routing' => array(
            'pretty_version' => 'v4.4.44',
            'version' => '4.4.44.0',
            'reference' => 'f7751fd8b60a07f3f349947a309b5bdfce22d6ae',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/routing',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/twig-bridge' => array(
            'pretty_version' => 'v3.4.47',
            'version' => '3.4.47.0',
            'reference' => '090d19d6f1ea5b9e1d79f372785aa5e5c9cd4042',
            'type' => 'symfony-bridge',
            'install_path' => __DIR__ . '/../symfony/twig-bridge',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/var-dumper' => array(
            'pretty_version' => 'v5.4.11',
            'version' => '5.4.11.0',
            'reference' => 'b8f306d7b8ef34fb3db3305be97ba8e088fb4861',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/var-dumper',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twig/twig' => array(
            'pretty_version' => 'v2.15.2',
            'version' => '2.15.2.0',
            'reference' => '3e43405a9a8b578809426339cc3780e16fba0c52',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twig/twig',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
