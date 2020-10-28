<?php
    namespace Source\Core;
    /**
     * Class Imgur - BB_Imgur Imagem System.
     * @package Source\Core
     */
    class Imgur{

        /**
         * @var array - Atributo para gurdar o token gerado pela classe Token().
         */
        private $token;

        /**
         * @var array - Atrobuto para guardar os erros caso o token expirar.
         */
        private $errors;

        /**
         * Imgur constructor.
         * @param array $token - Informações do token gerado ou erros.
         */
        public function __construct(array $token)
        {
            if(isset($token['Error'])){
              $this->errors = ["Error" => $token['Error']];
              $this->token = [];
            }else{
                $this->errors = [];
                $this->token = $token;
            }
        }

        /**
         * Método responsável por fazer um upload da imagem, Dependencia da classe Image().
         * @param Image $image - Dependencia da classe Image()
         * @return array|mixed
         * @throws \Exception
         */
        public function uploadImage(Image $image)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "upload";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->post($image->getData())->run();

            }else{
                return $this->errors;
            }
        }


        /**
         * Método responsável por trazer as imagens do diretorio.
         * @return array|mixed
         */
        public function getImages()
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "account/{$tokArr['account_username']}/images";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->get()->run();
            }else{
                return $this->errors;
            }
        }

        /**
         * Método responsável por buscar as informações de uma imagem pelo seu código.
         * @param string $id - Id da imagem.
         * @return array|mixed
         */
        public function getImage(string $id)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "image/" . $id;
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->get()->run();
            }else{
                return $this->errors;
            }
        }

        /**
         * Método responsável por deletar uma imagem no diretório.
         * @param string $id - Id da imagem a ser deletada.
         * @return array|mixed
         */
        public function deleteImage(string $id)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "image/" . $id;
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->delete()->run();
            }else{
                return $this->errors;
            }
        }

        /**
         * Método responsável por "setar"  e alterar as informações da imagem.
         * @param Image $image - Dependencia da classe Image().
         * @return array|mixed
         * @throws \Exception
         */
        public function updateImage(Image $image)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $imageInfo = $image->getData();
                $uri = URL_IMGUR . "image/" . $imageInfo['id'];
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->post($imageInfo)->run();
            }else{
                return $this->errors;
            }
        }


        /**
         * Método responsável por trazer os albums relacionados a conta.
         * @return array|mixed
         */
        public function getAlbums()
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "account/{$tokArr['account_username']}/albums";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->get()->run();
            }else{
                return $this->errors;
            }

        }

        /**
         * Método responsável por buscar os informações do album.
         * @param string $albumId - O id do album aser buscada.
         * @return array|mixed
         */
        public function getInfoAlbum(string $albumId)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "album/{$albumId}";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->get()->run();
            }else{
                return $this->errors;
            }
        }


        /**
         * Método responsável por buscar as imagens relacionadas ao album.
         * @param string $albumId - Id do album
         * @return array|mixed
         */
        public function getImagesFromAlbum(string $albumId)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "album/{$albumId}/images";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->get()->run();
            }else{
                return $this->errors;
            }
        }

        /**
         * Método responsável por buscar as informações da foto relacionada ao album.
         * @param string $albumId - Id do album.
         * @param string $imageId - Id da Imagem.
         * @return array|mixed
         */
        public function getInfoImageFromAlbum(string $albumId, string $imageId)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "album/{$albumId}/image/{$imageId}";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->get()->run();
            }else{
                return $this->errors;
            }
        }

        /**
         * Método responsável por criar um album.
         * @param Album $album - Dependencia da classe Album().
         * @return array|mixed
         * @throws \Exception
         */
        public function createAlbum(Album $album)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "album";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->post($album->getData())->run();
            }else{
                return $this->errors;
            }
        }

        /**
         * Método responsável por atualizar informações de um album.
         * @param Album $album - Dependencia da classe Album().
         * @return array|mixed
         * @throws \Exception
         */
        public function updateAlbum(Album $album)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $albumInfo = $album->getData();
                $uri = URL_IMGUR . "album/{$albumInfo['id']}";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->put($album->getData())->run();
            }else{
                return $this->errors;
            }

        }

        /**
         * Método responsável por deletar um album.
         * @param string $id - Id do album
         * @return array|mixed
         */
        public function deleteAlbum(string $id)
        {
            $tokArr = $this->token;
            if(!empty($tokArr)){
                $uri = URL_IMGUR . "album/{$id}";
                $header = ["Authorization: Bearer {$tokArr['access_token']}"];
                return (new Request($uri, $header))->delete()->run();
            }else{
                return $this->errors;
            }
        }


    }