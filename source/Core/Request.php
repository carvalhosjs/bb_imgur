<?php
    namespace Source\Core;

    /**
     * Class Request - BB_Imgur Imagem System.
     * @package Source\Core
     */
    class Request{

        /**
         * @var false|resource - Atributo para guardar a chamada CURL.
         */
        private $curl;

        /**
         * @var string  - Atributo que contem a url da chamada.
         */
        private $uri;

        /**
         * @var array - Atributo que contem as informações obtidas pelo CURL.
         */
        private $data;

        /**
         * Request constructor.
         * @param string $uri - Parametro de URL para ser buscada pelo CURL.
         * @param array $headers - Parametro para adicionar HEADERS extras durante a chamada.
         */
        public function __construct(string $uri, array $headers=[])
        {
            $this->uri = $uri;
            $this->curl = curl_init($this->uri);
            curl_setopt($this->curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->curl, CURLOPT_BINARYTRANSFER, true);
            $defaultheaders = ['Content-Type: application/json'];
            $headerss = array_merge($defaultheaders, $headers);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headerss);

        }

        /**
         * Método responsável por criar uma chamada do tipo POST.
         * @param array $data - Dadas de FORM que serão buscado ou chamados pelo post.
         * @return $this
         * @throws \Exception
         */
        public function post(array $data)
        {

            if(empty($data)){
                throw  new \Exception("Dados em branco");
                exit;
            }
            $data_string = json_encode($data);
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data_string);
            return $this;
        }

        /**
         * Método responsável por criar uma chamada do tipo PUT.
         * @param array $data - Dadas de FORM que serão buscado ou chamados pelo post.
         * @return $this
         * @throws \Exception
         */
        public function put(array $data)
        {

            if(empty($data)){
                throw  new \Exception("Dados em branco");
                exit;
            }
            $data_string = json_encode($data);
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data_string);
            return $this;
        }

        /**
         * Método responsável por criar uma chamada do tipo DELETE.
         * @return $this
         */
        public function delete()
        {
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            return $this;
        }

        /**
         * Método responsável por criar uma chamada do tipo GET.
         * @return $this
         */
        public function get()
        {
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "GET");
            return $this;
        }

        /**
         * Método responsável por executar a chamada CURL e retornar um array associativo ou erros.
         * @return array|mixed
         */
        public function run()
        {
            $data = curl_exec($this->curl);
            $data = json_decode( $data, true);
            curl_close($this->curl);

            if(isset($data['success']) && $data['success']==false){
              $this->data = ["Error" => $data['data']['error']];
              return $this->data;
            }
            $this->data = $data;
            return $this->data;


        }



    }