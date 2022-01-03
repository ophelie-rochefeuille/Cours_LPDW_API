<?php

class Airports {

	// table
	private $db;
    private $table = "airports";

    // object properties
    public $id;
    public $name;
    public $latitude;
    public $longitude;

    /**
     * Constructor with $db
     *
     * @param $db
     */
    public function __construct($db){
        $this->db = $db;
    }


    /**
     * Create user
     *
     * @return boolean
     */
	public function create ($data) {
        $sql= "INSERT INTO airports (name, latitude, longitude) VALUES ('$data->name', '$data->latitude', '$data->longitude')";
        $query = $this->db->query($sql);
	}

    /**
     * Read all users
     *
     * @return array
     */
    public function read() {

        $sql = 'SELECT * FROM airports';
        $query = $this->db->query($sql);

        $jsonArray = array();
        
        while( $row = $query->fetchArray(SQLITE3_ASSOC) ) {

            $jsonArray[] = $row;
        }

        // print_r( $jsonArray );

        return $jsonArray;
    }

    /**
     * Update user
     *
     * @return boolean
     */
	public function update() {

        $sql="UPDATE airoports SET NAME = 'Montreal - Canada' WHERE id = 4";
        $query = $this->db->query($sql);
	}

    /**
     * Delete user
     *
     * @return boolean
     */
	public function delete () {

        $sql="DELETE FROM airports WHERE id = 4";
        $query = $this->db->query($sql);
	}
}

?>
