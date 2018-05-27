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
        $this->data['is_edit'] = false;
        $this->data['vehicleTypes'] = $this->vehicleTypeRepository->getVehicleTypeDropDown();
        $this->data['providers'] = $this->providerRepository->getProviderDropDown();
        $this->data['zones'] = $this->zoneRepository->getZoneDropDown();
        $this->data['hours'] = $this->hourRepository->getHoursDropDown();
        return view('pages.drivers.form', $this->data);
    }

    public function storeDriver(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required|min:3',
            'driver_id' => 'required|numeric',
            'vehicle_type_id' => 'required',
            'vehicle_owner' => 'sometimes|alpha_spaces',
            'phone_number' => 'required',
            'call_provider_id' => 'required|numeric',
            'phone_model' => 'sometimes|alpha_spaces',
            'isp_provider_id' => 'required|numeric',
            'zone_id' => 'required|numeric',
            'area' => 'sometimes|alpha_spaces',
            'station' => 'sometimes|alpha_spaces',
            'hour_id' => 'required|numeric'
        ]);

        if ($this->driverRepository->addDriver($request->all())) {
            return back()->with('success', 'Driver added successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }

    public function editDriver(Request $request, $id)
    {

    }

    public function updateDriver(Request $request, $id)
    {

    }
}
