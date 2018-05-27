<?php

namespace App\Http\Controllers;

use App\Contracts\IDriverRepository;
use App\Contracts\IHourRepository;
use App\Contracts\IProviderRepository;
use App\Contracts\IVehicleTypeRepository;
use App\Contracts\IZoneRepository;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * @var IVehicleTypeRepository
     */
    private $vehicleTypeRepository;
    /**
     * @var IProviderRepository
     */
    private $providerRepository;
    /**
     * @var IZoneRepository
     */
    private $zoneRepository;
    /**
     * @var IDriverRepository
     */
    private $driverRepository;
    /**
     * @var IHourRepository
     */
    private $hourRepository;

    /**
     * DriversController constructor.
     * @param IVehicleTypeRepository $vehicleTypeRepository
     * @param IProviderRepository $providerRepository
     * @param IZoneRepository $zoneRepository
     * @param IDriverRepository $driverRepository
     * @param IHourRepository $hourRepository
     */
    public function __construct(
        IVehicleTypeRepository $vehicleTypeRepository,
        IProviderRepository $providerRepository,
        IZoneRepository $zoneRepository,
        IDriverRepository $driverRepository,
        IHourRepository $hourRepository
    ) {
        //$this->middleware('auth');
        $this->vehicleTypeRepository = $vehicleTypeRepository;
        $this->providerRepository = $providerRepository;
        $this->zoneRepository = $zoneRepository;
        $this->driverRepository = $driverRepository;
        $this->hourRepository = $hourRepository;
    }

    /**
     * Show the driver on-board form
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showOnBoard(Request $request)
    {
        $this->data['title'] = 'On-board Driver';
        $this->data['subtitle'] = 'Add a new driver into the system';
        $this->data['edit'] = false;
        $this->data['vehicleTypes'] = $this->vehicleTypeRepository->getVehicleTypeDropDown();
        $this->data['providers'] = $this->providerRepository->getProviderDropDown();
        $this->data['zones'] = $this->zoneRepository->getZoneDropDown();
        $this->data['hours'] = $this->hourRepository->getHoursDropDown();
        return view('pages.drivers.form', $this->data);
    }
}
