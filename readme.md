#Imgur PHP com CURL
Biblioteca criada para gerenciar as fotos em sua conta no API Imgur através do PHP com CURL.

Nesse pacote terá 2 arquivos

* Index.php - Arquivo para exemplificar o uso dos métodos.
* Authorize.php - Arquivo para autorizar seu aplicativo a usar a api do imgur.

##### Album.php
Classe onde está localizado todo a rotina de manipulação do album.

* __construct(string $albumId='');
* setInfo();
* setPrivacy(string $privacy)
* setCover(string $imageID)
* setImages(array $imageIds)
* getData()
* filterData()
* array_flatten(array $array)

##### Image.php
Classe onde está localizado todo a rotina de manipulação do Image.

*__construct(string $title, string $description="", string $id="")
* setImageURL(string $image)
* setImageBase64(string $image)
* setImageBinary(string $imagem)
* setAlbum(string $albumId)
* getData()

##### Imgur.php
Classe onde está localizado todo a rotina de manipulação das funções das imagens e albuns.

* __construct(array $token)
* uploadImage(Image $image)
* getImages()
* getImage(string $id)
* deleteImage(string $id)
* updateImage(Image $image)
* getAlbums()
* getInfoAlbum(string $albumId)
* getImagesFromAlbum(string $albumId)
* getInfoImageFromAlbum(string $albumId, string $imageId)
* createAlbum(Album $album)
* updateAlbum(Album $album)
* deleteAlbum(string $id)

##### Request.php
Classe onde está localizado as requisições CURL.

* __construct(string $uri, array $headers=[])
* post(array $data)
* put(array $data)
* delete()
* get()
* run()

##### Token.php

Classe onde está localizado a chamada para obter o Bearer Token.

* __construct()
* setCode(string $code): Token
* setPin(string $pin): Token
* getCode(): array
* getPin(): array
* getToken(): array

#
####Config.php
Arquivo contem as configurações da conta do imgur.
https://api.imgur.com/oauth2/addclient

* CLIENT_ID - código fornecido pela API da IMGUR.
* CLIENT_SECRECT - código fornecido pela API da IMGUR.
