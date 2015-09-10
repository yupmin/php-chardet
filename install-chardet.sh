#!/bin/sh
set -ex
wget https://pypi.python.org/packages/source/c/chardet/chardet-2.3.0.tar.gz
tar xvfz chardet-2.3.0.tar.gz
cd chardet-2.3.0 && python setup.py install --user
cp ~/.local/bin/chardetect ~/.local/bin/chardet && export PATH=$PATH:~/.local/bin/
