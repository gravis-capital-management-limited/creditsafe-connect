<?php

namespace SynergiTech\Creditsafe\Models;

use SynergiTech\Creditsafe\Models\Company\CreditScore;

/**
 *  This class contains all data relating to the company
 */
class Portfolio
{

    protected $client;
    protected $portfolioID;
    protected $name;
    protected $isDefault;


    /**
     * Function constructs the Company Class
     * @param array $client         Used to store the client in the Company Class
     * @param array $companyDetails  Company Data that needs to be stored in the Company Class
     */
    public function __construct($client, array $portfolioDetails)
    {
        $this->client = $client;
        $this->portfolioID = $portfolioDetails['portfolioId'];
        $this->name = $portfolioDetails['name'] ?? null;
        $this->isDefault = $portfolioDetails['isDefault'] ?? false;
    }

    /**
     *
     * @return string Return Portfolio ID
     */
    public function getPortfolioID() : string
    {
        return $this->portfolioID;
    }

    /**
     *
     * @return string Return Portfolio Name
     */
    public function getPortfolioName() : string
    {
        return $this->name ?? '';
    }

    /**
     *
     * @return bool Return is default 
     */
    public function getIsDefault() : boolean
    {
        return $this->isDefault ?? false;
    }
	
	
	public function addCompany(string $companyID) : array
	{			
		$params = [
			'id' => $companyID,
			'personalReference' => "",
			'freeText' => "",
			'personalLimit' => ""
		];
		
		return $this->client->post('monitoring/portfolios/'.$this->portfolioID.'/companies',$params);
	}
	
}
