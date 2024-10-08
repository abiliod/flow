<p align="center"><img width="300" src="public/images/flow2.png"></p>

## Introduction

This is the source code of demo [flow.mary-ui.com](https://flow.mary-ui.com) built with [maryUI](https://mary-ui.com).

## All demos

See at https://mary-ui.com/docs/demos.

## Sponsor

Let's keep pushing it, [sponsor me]❤️


## Install

This demo is made with Laravel, Livewire, Volt and Mary.

Clone the repository.

```bash

```

Create `.env` from `.env.example` and adjust few vars.

```bash
APP_ENV=local
APP_DEBUG=true
```

Install, migrate and start.

```bash
# See `composer.json`
composer start
```


## Note

This demo ships some default images inside the `/storage/public/` folder to make it beautiful out of the box.
Take a look at `/storage/app/.gitignore`, `/storage/app/public/.gitignore` and `/storage/app/public/products/.gitignore` and make sure you will adjust it to not commit files from
there.

At the same time we have placed our TinyMCE API KEY inside the default `app.blade.php`  template to make `<x-editor />` work out of the box. You should create a new one on TinyMCE
site and use it
instead.
{{--    https://www.tiny.cloud/my-account/domains/   registre o dominio local para testes [http://127.0.0.1:8000].--}}
