<?php

class Registration
{
	protected $id;
	protected $name;
	protected $email;
	protected $password;
	protected $picture;

	const TYPE_DOCUMENT = 'document';
	const TYPE_IMAGE = 'image';

	const DIRECTORY_DOCUMENTS = 'documents/';
	const DIRECTORY_IMAGES = 'images/';

	public function __construct(
		$name,
        $email,
		$picture = null,
		$password = null
	)
	{
		$this->name = $name;
		$this->picture = $picture;
		$this->email = $email;
        $this->password = $password;
	}

	public function getName()
	{
		return $this->name;
	}

    public function getEmail()
	{
		return $this->email;
	}

	public function getPicture()
	{
		return $this->picture;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function save()
	{
		global $pdo;
		try {

			$sql = "INSERT INTO registrations SET complete_name=:name, email=:email, password=:password, picture_path=:picture, registered_at=:dateTime" ;

			$statement = $pdo->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':email' => $this->getEmail(),
				':password' => $this->getPassword(),
                ':picture' => $this->getPicture()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public static function handleUpload($fileObject)
	{
		try {
			$base_dir = getcwd() . '/';
			$target_dir = $base_dir . static::DIRECTORY_DOCUMENTS;

			$check = getimagesize($fileObject['tmp_name']);
			if ($check !== false) {
				$target_dir = $base_dir . static::DIRECTORY_IMAGES;
			}

			if (is_uploaded_file($fileObject['tmp_name'])) {
				$target_file_path = $target_dir . $fileObject['name'];
				if (move_uploaded_file($fileObject['tmp_name'], $target_file_path)) {
					$file_type = static::TYPE_DOCUMENT;
					if (strpos($target_file_path, static::DIRECTORY_IMAGES)) {
						$file_type = static::TYPE_IMAGE;
					}
					return [
						'path' => $target_file_path,
						'type' => $file_type
					];
				}
			}
		} catch (Exception $e) {
			error_log($e->getMessage());
			return false;
		}
	}
}