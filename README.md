# encrypt-php
Ultra-lightweight PHP message encryptor

# Usage
### Encryption
  - Open the browser and type 
```
localhost:9999
```

  - Type your password and the message in the "Encrypt" form.
  - Click the Submit button in the "Encrypt" form.
  - Copy the output text in the  "Encrypt" form.

### Decryption
  - Open the browser and type 
```
localhost:9999/encrypt-php
```

  - Type your password and the encrypted code in the "Decryption" form.
  - Click the Submit button in the "Decryption" form.
  - Get the decrypted text in output of the "Decryption" form.

# Instalation
### Linux
```
sudo apt-get install php5-cli
sudo apt-get install apache2
sudo apt-get install php5-mcrypt
```

##### Config apache server
Open the apache folder (possible `/var/www/` or `/var/www/html`)

Clone this repository in this folder:
HTTPS:
```
git clone https://github.com/Filipizaum/encrypt-php.git
```
SSH:
```
git clone git@github.com:Filipizaum/encrypt-php.git
```

Done.

Now you just must have apache2 stated, open the browser and access `localhost:9999/encrypt-php`