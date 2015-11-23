<?php

class Usecase extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $code;

    /**
     *
     * @var string
     */
    protected $nom;

    /**
     *
     * @var integer
     */
    protected $poids;

    /**
     *
     * @var integer
     */
    protected $avancement;

    /**
     *
     * @var integer
     */
    protected $idProjet;

    /**
     *
     * @var integer
     */
    protected $idDev;

    /**
     * Method to set the value of field code
     *
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Method to set the value of field nom
     *
     * @param string $nom
     * @return $this
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Method to set the value of field poids
     *
     * @param integer $poids
     * @return $this
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Method to set the value of field avancement
     *
     * @param integer $avancement
     * @return $this
     */
    public function setAvancement($avancement)
    {
        $this->avancement = $avancement;

        return $this;
    }

    /**
     * Method to set the value of field idProjet
     *
     * @param integer $idProjet
     * @return $this
     */
    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    /**
     * Method to set the value of field idDev
     *
     * @param integer $idDev
     * @return $this
     */
    public function setIdDev($idDev)
    {
        $this->idDev = $idDev;

        return $this;
    }

    /**
     * Returns the value of field code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Returns the value of field poids
     *
     * @return integer
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Returns the value of field avancement
     *
     * @return integer
     */
    public function getAvancement()
    {
        return $this->avancement;
    }

    /**
     * Returns the value of field idProjet
     *
     * @return integer
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }

    /**
     * Returns the value of field idDev
     *
     * @return integer
     */
    public function getIdDev()
    {
        return $this->idDev;
    }

    /**
     * Returns the value of field code
     *
     * @return string
     */
    public function getId()
    {
    	return $this->code;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('code', 'Tache', 'codeUseCase', array('alias' => 'Tache'));
        $this->belongsTo('idProjet', 'Projet', 'id', array('alias' => 'Projet'));
        $this->belongsTo('idDev', 'User', 'id', array('alias' => 'User'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usecase[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usecase
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


    public function __toString(){
    	return $this->nom;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usecase';
    }

}
