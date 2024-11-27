#!/bin/bash

export IP=$(ifconfig en0 | grep "inet " | awk '{print $2}')

echo "your current IP is: "$IP
