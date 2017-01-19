<?php
/**
 * Profile Class
 *
 * This is an example of the data collected about a user of dgcoursereview.com. This can be expanded to include more optional profile information such as birthday, date started playing, notes, etc.
 *
 * @author Brett Gilbert <bgilbert9@cnm.edu>
 **/
class Profile {
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
	 **/
	public function setProfileEMail(string $newProfileEmail) {
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("email content is empty or insecure"));
		}
		$this->profileEmail = $newProfileEmail;
	}

	/**
	 * accessor method for profile pdga number
	 *
	 * @return int value of profile pdga number
	 **/
	public function getProfilePdgaNumber() {
		return($this->profilePdgaNumber);
	}

	/**
	 * mutator method for profile pdga number
	 *
	 * @param int|null $newProfilePdgaNumber new value of profile pdga number
	 * @throws \RangeException if $newProfilePdgaNumber is not positive
	 */
	/**
	 * @param mixed $profilePdgaNumber
	 */
	public function setProfilePdgaNumber($profilePdgaNumber) {
		$this->profilePdgaNumber = $profilePdgaNumber;
	}
}
?>