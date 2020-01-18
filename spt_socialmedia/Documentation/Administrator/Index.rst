.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

By default jquery library has been disabled inside the extension. If the website has already jQuery library, we don't need to include the library from the extension.

If we need to load jQuery library from the extension, use the following typoscript configuration (setup);

plugin.tx_sptsocialmedia_sptsocialmedia.settings.includeJSLib = 1
