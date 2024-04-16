<?php

namespace SynergiTech\Creditsafe\Service;

use \SynergiTech\Creditsafe\ListResult;
use \SynergiTech\Creditsafe\Models\Portfolio;

/**
 * This class is used by the client to call endpoints relating to a company
 */
class PortfolioService
{
    protected $client;
    protected $id;
	protected $name;

    /**
     * This constructor builds the CompanyServices Class
     * @param array $client This variable stores the client in the CompanyServices Class
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
	*This function creates a new portfolio
	*/
	public function post(string $name) : Portfolio
	{
		$params = [
			'name' => $name
		];
		
		return new Portfolio($this->client, $this->client->post('monitoring/portfolios',$params));
	}
	
	/**
     * This function is used to call the endpoint that gets the portfolio information
     * @param string $id The ID of the portfolio
     * @return Portfolio Returns the results of the get endpoint
     */
    public function get(string $id) : Portfolio
    {
        return new Portfolio($this->client, $this->client->get('monitoring/portfolios/'.$id));
    }

	public function listPortfolios() : array
	{
		return $this->client->get('monitoring/portfolios');
	}

}
