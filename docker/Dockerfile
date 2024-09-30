FROM php:8.2-cli

ARG USER_NAME=utente

USER root

RUN apt-get update \
    && apt install git -y \
    && apt install wget -y \
    && apt install zsh -y \
    && apt install zip -y \
    && apt install unzip -y

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN useradd ${USER_NAME} --create-home -s /bin/bash

USER $USER_NAME
# run the installation script
RUN wget https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh -O - | zsh || true
COPY ./shell/zsh.rc /home/${USER_NAME}/.zshrc

USER root
RUN chsh -s $(which zsh) ${USER_NAME}
#
## Install Composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
#COPY ./abac/ /usr/src/abac
USER $USER_NAME
WORKDIR /home/${USER_NAME}/abac
