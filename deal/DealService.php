<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/car/CarRepository.php';
class DealService
{


    private DealRepository $dealRepository;
    private CarRepository $carRepository;
    private string $any = '%';
    public function __construct(DealRepository $dRep, CarRepository $cRep)
    {
        $this->dealRepository = $dRep;
        $this->carRepository = $cRep;
    }

    public function deals(): bool|array|PDOStatement
    {
    $result = array();
    if(!isset($_GET['username']) && !isset($_GET['cost']))
    {
        $this->prepareGet();
        $result = $this->dealRepository->fetchDeals();
    } else
    {
        $this->prepareGet();
        $result = $this->dealRepository->filteredDeals();
    }
        return $result;
    }

    public function create(): bool
    {
        $this->putCarId();
        return $this->dealRepository->create($_POST);
    }

    public function edit(): bool
    {
        $this->putCarId();
        return $this->dealRepository->edit($_POST);
    }

    public function delete(): bool
    {
        return $this->dealRepository->delete($_GET['id']);
    }

    public function byId(int $id): mixed
    {
        return $this->dealRepository->byId($id);
    }

    public function changePicture(): bool
    {
        $new = $this->uploadPicture();
        return $this->dealRepository->changePicture($new, $_POST['id']);
    }

    private function prepareGet(): void
    {
        $this->anyIfNotExist('username');
        $this->anyIfNotExist('cost');
    }

    private function anyIfNotExist(string $key): void
    {
        if (isset($_GET[$key])) {
            if ($_GET[$key] === '') {
                $_GET[$key] = $this->any;
            }
        }
    }

    private function putCarId(): void
    {
        $_POST['id_car'] = $this->carRepository->idByName($_POST['carname']);
    }

    public function uploadPicture(): string {
        $name = $_FILES['picture-input']['name'];
        $target = $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user_images/';
        $new = md5($_POST['id']) . '.' . pathinfo($name, PATHINFO_EXTENSION);
        if (file_exists($target . $new))
        {
            unlink($target . $new);
        }
        if (!move_uploaded_file($_FILES['picture-input']['tmp_name'], $target . $new))
        {
            echo "File is not loaded.";
        }
        return $new;
    }

}