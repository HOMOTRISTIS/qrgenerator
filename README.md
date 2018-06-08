QR Code Render
========================================

Created for test.

Usage
-------

1. In application.config.php

   ```php
	return array(
          'modules' => array(
               ...,
               'QRender',
               ....
    ```
2. In the controller

   ```php
	    $qrender = $this->getServiceLocator()->get('QRender')->init($client, $endpoint);
        $qrender->setData('My Data', 50, 50);
        $qrCode = $qrender->generate();
   ```
 