## Config Form - Drupal 8

This module is designed using Drupal form API to provide a sample form which stores data in config table

Follow the Steps sequentially to install the module
1. Go to <domain.com>/admin/modules
2. install "Config Example" module.
3. Go to /admin/config/form/settings to set the values of the form


If you would like to add more fields in the form, You have to make changes in one file SettingsForm.php under two functions buildForm and submitForm, rest the module will take care.


config_example.settings.yml resided t /config/install takes care of default value that prepoulated after module install and thorugh form you can make changes.

If you don't want any prepoluted data in the field then delete entire config folder from the module.

You can get the field value anywhere in the project by following code:

  **Get Field 1 value:**
 ```\Drupal::config('config_example.settings')->get('field1');```
 
 **Get Field 2 value:**
 ```\Drupal::config('config_example.settings')->get('field2');```



**NOTE:** If downloading module rename the folder from config_example_master to config_example
