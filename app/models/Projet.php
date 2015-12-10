<?php

class Projet extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $nom;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $dateLancement;

    /**
     *
     * @var string
     */
    protected $dateFinPrevue;

    /**
     *
     * @var string
     */
    protected $image;

    /**
     *
     * @var integer
     */
    protected $idClient;
	
    /**
    * @var integer
    */
    protected $idManager;
    
    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field dateLancement
     *
     * @param string $dateLancement
     * @return $this
     */
    public function setDateLancement($dateLancement)
    {
        $this->dateLancement = $dateLancement;

        return $this;
    }

    /**
     * Method to set the value of field dateFinPrevue
     *
     * @param string $dateFinPrevue
     * @return $this
     */
    public function setDateFinPrevue($dateFinPrevue)
    {
        $this->dateFinPrevue = $dateFinPrevue;

        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method to set the value of field idClient
     *
     * @param integer $idClient
     * @return $this
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }
    
    /**
     * Method to set the value of field idClient
     *
     * @param integer $idManager
     * @return $this
     */
    public function setIdManager($idManager)
    {
    	$this->idManager = $idManager;
    
    	return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field dateLancement
     *
     * @return string
     */
    public function getDateLancement()
    {
        return $this->dateLancement;
    }

    /**
     * Returns the value of field dateFinPrevue
     *
     * @return string
     */
    public function getDateFinPrevue()
    {
        return $this->dateFinPrevue;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field idClient
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
    
    /**
     * Returns the value of field idClient
     *
     * @return integer
     */
    public function getIdManager()
    {
    	return $this->idManager;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Message', 'idProjet', array('alias' => 'Messages'));
        $this->hasMany('id', 'Usecase', 'idProjet', array('alias' => 'Usecases'));
        $this->belongsTo('idClient', 'User', 'id', array('alias' => 'Client'));
        $this->belongsTo('idManager', 'User', 'id', array('alias' => 'Manager'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projet[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Projet
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


    public function __toString(){
        return $this->getNom();
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'projet';
    }
    
    public function getAvancement(){
    	$id=$this->getId();
    	$ucs=Usecase::find("idProjet=".$id);
    	$ucTotal = 0;
    	foreach ($ucs as $uc){
    		$ucTotal+=$uc->getPoids();
    	}
    	//poid uc
    	$avancement = 0;
    	foreach ($ucs as $uc){
    		$poidRel=($uc->getPoids()/$ucTotal)*100;
    		$avancement+=$poidRel*($uc->getAvancement()/100);
    		ceil($avancement);
    	}
    	 
    	return round($avancement);
    }

}
