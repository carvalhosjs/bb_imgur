<?php
    namespace Source\Core;
    /**
     * Class Image - BB_Imgur Imagem System.
     * @package Source\Core
     */
    class Token{

        /**
         * @var string - Atributo para guardar o codigo da camada quando fazer o Authorize().
         */
        private $code;

        /**
         * @var string - Atributo para gurdar o código do client da IMGUR
         * https://api.imgur.com/oauth2/addclient
         */
        private $client_id;

        /**
         * @var string -  Atributo para gurdar o código do client secret da IMGUR
         * https://api.imgur.com/oauth2/addclient
         */
        private $client_secret;

        /**
         * @var string - Atributo para guardar o tipo do retorno da requisição do CURL.
         */
        private $grant_type;

        /**
         * Token constructor.
         */
        public function __construct()
        {
            $this->client_id = CLIENT_ID;
            $this->client_secret = CLIENT_SECRECT;
            $this->grant_type = CLIENT_GRANT_TYPE;
        }

        /**
         * Método responsável por "setar" o código do retorno da API ImgUR.
         * @param string $code - Código do retorno do Authorize().
         * @return Token
         */
        public function setCode(string $code): Token{
            $this->code = $code;
            return $this;
        }

        /**
         * Método responsável por "setar" o código por PIN da API ImgUr;
         * @param string $pin - Código Pin do retorno do Authorize().
         * @return Token
         */
        public function setPin(string $pin): Token{
            $this->code = $pin;
            return $this;
        }

        /**
         * Método responsável por montar um array por code (Authorize()) para ser enviado para CURL.
         * @return array
         */
        public function getCode(): array
        {
            return ['code' => $this->code, 'client_id' => $this->client_id, 'client_secret' => $this->client_secret, 'grant_type' => 'authorization_code' ];
        }

        /**
         * Método responsável por montar um array por PIN (Authorize()) para ser enviado para CURL.
         * @return array
         */
        public function getPin(): array
        {
            return ['pin'=> $this->code, 'client_id' => $this->client_id, 'client_secret' => $this->client_secret, 'grant_type' => $this->grant_type ];
        }

        /**
         * Método responsável por criar uma requisição no CURL para trazer o Token.
         * @return array
         * @throws \Exception
         */
        public function getToken(): array
        {
            return (new Request(URL_TOKEN))->post($this->getCode())->run();

        }

    }