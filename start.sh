#!/bin/bash
sudo bash <<EOF
systemctl start nginx.service
systemctl start docker.service
systemctl start php-fpm.service
EOF

echo 'Done!'