<?php

namespace App\Http\Controllers;

use App\Contracts\IDriverRepository;
use App\Contracts\IHourRepository;
use App\Contracts\IProviderRepository;
use App\Contracts\IVehicleTypeRepository;
use App\Contracts\IZoneRepository;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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

    public function index()
    {
        $this->data['title'] = 'View All Drivers';
        $this->data['subtitle'] = 'View all drivers into the system';
        return view('pages.drivers.index', $this->data);
    }

    public function getDrivers(Request $request)
    {

        $columns = [
            'drivers.id','drivers.name', 'driver_id',
            'phone_number', DB::raw('vehicle_types.name AS vehicle_type'), 'drivers.active',
            DB::raw('zones.name AS zone_name'),'banned'
        ];

        $drivers = $this->driverRepository->getDriverDataTableData($columns);

        return Datatables::of($drivers)
            ->addColumn('action', function ($user) {
                return '<a href="'.route('drivers.edit', ['id' => $user->driver_id]).'" 
                    class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
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
        $this->validateDriver();
        if ($this->driverRepository->addDriver($request->all())) {
            return back()->with('success', 'Driver added successfully');
        }

        return back()->with('error', 'Something went wrong. Please try again.');
    }

    public function editDriver(Request $request, $id)
    {
        $this->data['driver'] = $this->driverRepository->getDriver($id, 'driver_id');
        $this->data['title'] = $this->data['driver']->name;
        $this->data['subtitle'] = 'Update driver information';
        $this->data['is_edit'] = true;
        $this->data['vehicleTypes'] = $this->vehicleTypeRepository->getVehicleTypeDropDown();
        $this->data['providers'] = $this->providerRepository->getProviderDropDown();
        $this->data['zones'] = $this->zoneRepository->getZoneDropDown();
        $this->data['hours'] = $this->hourRepository->getHoursDropDown();
        return view('pages.drivers.form', $this->data);
    }

    public function updateDriver(Request $request, $id)
    {
        $this->validateDriver();
        if ($this->driverRepository->updateDriver($id, $request->except('_token', '_method'), 'driver_id')) {
            return back()->with('success', 'Driver updated successfully');
        }
        return back()->with('error', 'Something went wrong. Please try again.');
    }

    protected function validateDriver()
    {
        $this->validate(request(), [
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
    }
}
