<?php
    namespace Source\Core;

    /**
     * Class Album - BB_Imgur Imagem System.
     * @package Source\Core
     */
    class Album
    {
        /**
         * @var string - Atributo para guardar o código do album para genrenciar campos relacionados.
         */
        private $albumId;

        /**
         * @var array - Atributo em array contendo todos IDS das imagens para alocar dentro desse album.
         */
        private $imageIds;

        /**
         * @var string - Atributo para gurdar e alterar o titulo de um album.
         */
        private $title;

        /**
         * @var string - Atributo para gurdar e alterar uam descrição de um album.
         */
        private $description;

        /**
         * @var string - Atributo para alterar a visibilidade do album -public/hidden (padrão hidden).
         */
        private $privacy;

        /**
         * @var string - Atributo para configurar um código de imagem para ser a capa do album.
         */
        private $cover;

        /**
         * Album constructor.
         * @param string $albumId - Parametro não obrigatório,caso for informado ele será responsável por alterar informações do album.
         */
        public function __construct(string $albumId='')
        {
            $this->albumId = $albumId;
        }

        /**
         * Método responsável por "setar" os parametros como titulo e descrição do album.
         * @param string $title - Titulo do album.
         * @param string $description - Descrição do album.
         * @return $this
         */
        public function setInfo(string $title, string $description='')
        {
            $this->title = $title;
            $this->description = $description;
            $this->privacy = 'hidden';
            $this->cover = '';
            $this->imageIds = [];
            return $this;
        }

        /**
         * Método responsável por "setar" a visibilidade do album (public/hidden).
         * @param string $privacy - (public/hidden).
         * @return $this
         */
        public function setPrivacy(string $privacy)
        {
            $this->privacy = $privacy;
            return $this;
        }

        /**
         * Método responsável por por "setar" o ID da imagem para ser capa da foto e utilizada para alteração do mesmo.
         * @param string $imageID - ID da imagem para ser capa do album.
         * @return $this
         */
        public function setCover(string $imageID)
        {
            $this->cover = $imageID;
            return $this;
        }

        /**
         * Método responsável por colocar imagens dentro do album criado.
         * @param array $imageIds - Um array contendo todos os IDs das imagens a serem colocados detro do album.
         * @return $this
         */
        public function setImages(array $imageIds)
        {
            $this->imageIds = $imageIds;
            return $this;
        }

        /**
         * Método responsável por trazer as informações tratadas em array para o CURL (POST,PUT).
         * @return array
         */
        function getData()
        {
            return $this->filterData();
        }

        /**
         * Método responsável por tratar os campos invocado por getData(), trazendo apenas os campos que serão modificados.
         * @return array
         */
        private function filterData()
        {
            $filtered = [];
            $ids=[];

            if(!empty($this->albumId)){
                $filtered[] = ["id" => $this->albumId];
            }

            if(!empty($this->title)){
               $filtered[] = ['title' => $this->title];
            }

            if(!empty($this->description)){
               $filtered[] = ['description' => $this->description];
            }

            if(!empty($this->privacy)){
                $filtered[] = ['privacy' => $this->privacy];
            }

            if(!empty($this->cover)){
                $filtered[] = ['cover' => $this->cover];
            }

            if(!empty($this->albumId)){
                $filtered[] = ['id' => $this->albumId];
            }

            $filtered = $this->array_flatten($filtered);

            if(!empty($this->imageIds)){
                $ids = ["ids" => $this->imageIds];
                $filtered['ids'] = $ids['ids'];
            }

            return $filtered;

        }


        /**
         * Método responsável por tratar array multidimensionais pra simples.
         * @param array $array - Array multidimensional
         * @return array
         */
        private function array_flatten(array $array) {
            if (!is_array($array)) {
                return [];
            }
            $result = array();
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $result = array_merge($result, $this->array_flatten($value));
                }
                else {
                    $result[$key] = $value;
                }
            }
            return $result;
        }



    }