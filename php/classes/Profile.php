<?php
/**
 * Profile Class
 *
 * This is an example of the data collected about a user of dgcoursereview.com. This can be expanded to include more optional profile information such as birthday, date started playing, notes, etc.
 *
 * @author Brett Gilbert <bgilbert9@cnm.edu>
 **/
class Profile implements \JsonSerializable {
	/**
	 * id for this profile, this is the primary key
	 **/
	private $profileId;
	/**
	 * email for the user who owns this profile
	 **/
	private $profileEmail;
	/**
	 * pdga number of the user who owns this profile
	 **/
	private $profilePdgaNumber;
	/**
	 * location of the user who owns this profile
	 **/
	private $profileLocation;
	/**
	 * throwing style of the user who owns this profile
	 **/
	private $profileThrowingStyle;

	/**
	 * constructor for this profile
	 *
	 * @param int|null $newProfileId of this profile or null if a new profile
	 * @param string $newProfileEmail string containing the email of the user to whom the profile belongs
	 * @param string $newProfilePdgaNumber string containing the pdga number of the user to whom the profile belongs
	 * @param string $newProfileLocation string containing the location of the user to whom the profile belongs
	 * @param string $newProfileThrowingStyle string containing the throwing style of the user to whom the profile belongs
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate hints
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(int $newProfileId = null, string $newProfileEmail, string $newProfilePdgaNumber, string $newProfileLocation, string $newProfileThrowingStyle) {
		try {
			$this->setProfileId($newProfileId);
			$this->setProfileEMail($newProfileEmail);
			$this->setProfilePdgaNumber($newProfilePdgaNumber);
			$this->setProfileLocation($newProfileLocation);
			$this->setProfileThrowingStyle($newProfileThrowingStyle);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		} catch(\TypeError $typeError) {
			throw(new\TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for profile id
	 *
	 * @return int|null value of profile id
	 **/
	public function getProfileID() {
		return($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param int|null $newProfileId new value of profile id
	 * @throws \RangeException if $newProfileId is not positive
	 **/
	public function setProfileId(int $newProfileId = null) {
		// base case: if the user id is null, this is a new user w/o a mySQL assigned id (yet)
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}

		// verify the profile id is positive
		if($newProfileId <= 0) {
			throw(new \RangeException("profile id is not positive"));
		}

		// convert and store the profile id
		$this->profileId = $newProfileId;
	}

	/**
	 * accessor method for profile email
	 *
	 * @return string value of profile email
	 **/
	public function getProfileEmail() {
		return($this->profileEmail);
	}

	/**
	 * mutator method fot profile email
	 *
	 * @param string $newProfileEmail new value of profile email
	 * @throws \InvalidArgumentException if $newProfileEmail is insecure
	 * @throws \RangeException if $newProfileEmail is > 128 characters
	 **/
	public function setProfileEMail(string $newProfileEmail) {
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("email content is empty or insecure"));
		}
		if(strlen($newProfileEmail) > 128) {
			throw(new \RangeException("profile email too large"));
		}
		$this->profileEmail = $newProfileEmail;
	}

	/**
	 * accessor method for profile pdga number
	 *
	 * @return string value of profile pdga number
	 **/
	public function getProfilePdgaNumber() {
		return($this->profilePdgaNumber);
	}

	/**
	 * mutator method for profile pdga number
	 *
	 * @param string $newProfilePdgaNumber new value of profile pdga number
	 * @throws \InvalidArgumentException if $newProfilePdgaNumber is insecure
	 * @throws \RangeException if $newProfilePdgaNumber is > 7
	 **/
	public function setProfilePdgaNumber(string $newProfilePdgaNumber) {
		$newProfilePdgaNumber = trim($newProfilePdgaNumber);
		$newProfilePdgaNumber = filter_var($newProfilePdgaNumber, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfilePdgaNumber) === true)
			throw(new \InvalidArgumentException("profile pdga number is empty or insecure"));
		if(strlen($newProfilePdgaNumber) > 10) {
			throw(new \RangeException("profile pdga number too large"));
		}
		$this->profilePdgaNumber = $newProfilePdgaNumber;
	}

	/**
	 * accessor method for profile location
	 *
	 * @return string value for profile location
	 **/
	public function getProfileLocation() {
		return($this->profileLocation);
	}

	/**
	 * mutator method for profile location
	 *
	 * @param string $newProfileLocation new value of profile location
	 * @throws \InvalidArgumentException if $newProfileLocation is insecure
	 * @throws \RangeException if $newProfileLocation is > 128 characters
	 **/
	public function setProfileLocation(string $newProfileLocation) {
		$newProfileLocation = trim($newProfileLocation);
		$newProfileLocation = filter_var($newProfileLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileLocation) === true) {
			throw(new \InvalidArgumentException("profile location content is empty or insecure"));
		}
		if(strlen($newProfileLocation) > 128) {
			throw(new \RangeException("profile location content too large"));
		}
		$this->profileLocation = $newProfileLocation;
	}

	/**
	 * accessor method for profile throwing style
	 *
	 * @return string value for profile location
	 **/
	public function getProfileThrowingStyle() {
		return($this->profileThrowingStyle);
	}

	/**
	 * mutator method for profile throwing style
	 *
	 * @param string $newProfileThrowingStyle new value of profile throwing style
	 * @throws \InvalidArgumentException if $newProfileThrowingStyle is insecure
	 * @throws \RangeException if $newProfileThrowingStyle is >128 characters
	 **/
	public function setProfileThrowingStyle(string $newProfileThrowingStyle) {
		$newProfileThrowingStyle = trim($newProfileThrowingStyle);
		$newProfileThrowingStyle = filter_var($newProfileThrowingStyle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileThrowingStyle) === true) {
			throw(new \InvalidArgumentException("profile throwing style is empty or insecure"));
		}
		if(strlen($newProfileThrowingStyle) > 128) {
			throw(new \RangeException("profile throwing style too long"));
		}
		$this->profileThrowingStyle = $newProfileThrowingStyle;
	}
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
		// TODO: Implement jsonSerialize() method.
	}
}