<?php
namespace Source\Core;
/**
 * Class Image - BB_Imgur Imagem System.
 * @package Source\Core
 */
class Image{

    /**
     * @var string - Atributo para guardar o id da imagem.
     */
    private $id;

    /**
     * @var string - Atributo para guardar o base64 da imagem.
     */
    private $image;

    /**
     * @var string - Atributo para guardar o tipo da imagem (base64, file, URL)
     */
    private $type;

    /**
     * @var string - Atributo para guardar o titulo da imagem.
     */
    private $title;

    /**
     * @var string - Atributo para guardar a descrição da imagem.
     */
    private $description;

    /**
     * @var string - Atributo para guardar o ID do album para onde será enviado a imagem.
     */
    private $albumId;

    /**
     * Image constructor.
     * @param string $title - Titulo da Imagem.
     * @param string $description - Descrição da imagem.
     * @param string $id - Id da imagem se for alterar as informações da imagem.
     */
    public function __construct(string $title, string $description="", string $id="")
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Método responsável por "setar" uma imagem como URL para ser salva no servidor da IMGUR.
     * @param string $image - Caminho da URL da imagem.
     * @return $this
     */
    public function setImageURL(string $image)
    {
        $this->image = $image;
        $this->type = 'URL';
        return $this;
    }

    /**
     * Método responsável por "setar" a base64 da imagem (sem o código inicial do arquivo).
     * @param string $image - Campo da imagem em base64.
     * @return $this
     */
    public function setImageBase64(string $image)
    {
        $this->image = $image;
        $this->type = 'base64';
        return $this;
    }

    /**
     * Método responsável por "setar" uma imagem em binario.
     * @param string $imagem - Caminho da imagem em binario.
     * @return $this
     */
    public function setImageBinary(string $imagem)
    {
        $this->image = $imagem;
        $this->type = 'file';
        return $this;
    }

    /**
     * Método responsável por "setar" onde a imagem será atribuida no album.
     * @param string $albumId - Código da imagem
     * @return $this
     */
    public function setAlbum(string $albumId)
    {
        $this->albumId = $albumId;
        return $this;
    }

    /**
     * Método responsável por formatar um array paras CURL
     * @return array
     */
    public function getData()
    {
        return ['image' => $this->image, 'type' => $this->type, 'title' => $this->title, 'description' => $this->description, "id" => $this->id, "album" => $this->albumId];
    }

    private function clearBase64()
    {
        throw  new \Exception("Not Implemented");
    }


}