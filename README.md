# laravel-dkim-mail
Use DKIM to sign your mail messages

Generate your private and public keys:
openssl genrsa -out dkim-private.pem 1024
openssl rsa -in rsa.private -out dkim-public.pem -pubout -outform PEM

This guide is very useful to setup DKIM and DMARC: https://dmarcguide.globalcyberalliance.org/

Make sure to add your public key to a TXT DNS record on your domain:
default._domainkey.example.com IN TXT "v=DKIM1; k=rsa; p=anExamplePublicKey"

The 'default' part of the DNS name is the selector you wish to use to sign your emails.
For GoDaddy DNS, leave off the '.example.com' part of the name.

For DMARC, add another TXT record to your DNS:
_dmarc.example.com. IN TXT "v=DMARC1; p=none; rua=mailto:user@example.com; ruf=mailto:user@example.com; sp=none; ri=86400"