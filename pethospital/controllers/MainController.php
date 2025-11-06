<?php
class MainController
{
    private $hospital;
    private $employee;
    private $category;
    private $item;
    private $reciever;
    private $order;

    public function __construct($pdo)
    {
        require_once __DIR__ . '/../models/HospitalModel.php';
        require_once __DIR__ . '/../models/EmployeeModel.php';
        require_once __DIR__ . '/../models/CategoryModel.php';
        require_once __DIR__ . '/../models/ItemModel.php';
        require_once __DIR__ . '/../models/RecieverModel.php';
        require_once __DIR__ . '/../models/OrderModel.php';
        $this->hospital = new HospitalModel($pdo);
        $this->employee = new EmployeeModel($pdo);
        $this->category = new CategoryModel($pdo);
        $this->item = new ItemModel($pdo);
        $this->reciever = new RecieverModel($pdo);
        $this->order = new OrderModel($pdo);
    }

    public function main($parts)
    {
        switch ($parts[1]) {
            case 'home':
                require_once __DIR__ . '/../views/home.php';
                break;
            case 'hospitals':
                $this->hospitals($parts);
                break;
            case 'employees':
                $this->employees($parts);
                break;
            case 'items':
                $this->items($parts);
                break;
            case 'recievers':
                $this->recievers($parts);
                break;
            case 'orders':
                $this->orders($parts);
                break;
            case 'orderItems':
                $this->orderItems($parts);
                break;
            case 'categories':
                $this->categories($parts);
                break;
        }
    }

    public function hospitals($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewHospitals($parts);
                break;
            case 'edit':
                $this->editHospitals($parts);
                break;
            case 'insert':
                $this->insertHospitals($parts);
                break;
        }
    }

    public function viewHospitals($parts)
    {
        $allHospitals = $this->hospital->getAllHospitals();
        require_once __DIR__ . '/../views/hospital/hospitalView.php';
    }

    public function editHospitals($parts)
    {
        $id = $parts[3] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];

            $this->hospital->editHosital($name, $address, $contact, $id);
            header("Location: index.php?controller=main&action=main/hospitals/view");
            exit;
        }
        $currHospital = $this->hospital->getHospital($id);
        require_once __DIR__ . '/../views/hospital/hospitalEdit.php';
    }

    public function insertHospitals($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];

            $this->hospital->addHosital($name, $address, $contact);
            header("Location: index.php?controller=main&action=main/hospitals/view");
            exit;
        }
        require_once __DIR__ . '/../views/hospital/hospitalInsert.php';
    }

    public function employees($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewEmployee($parts);
                break;
            case 'edit':
                $this->editEmployee($parts);
                break;
            case 'insert':
                $this->insertEmployee($parts);
                break;
        }
    }

    public function viewEmployee($parts)
    {
        $allEmployees = $this->employee->getAllEmployees();
        require_once __DIR__ . '/../views/employee/employeeView.php';
    }

    public function editEmployee($parts)
    {
        $id = $parts[3] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $contact = $_POST['contact'];

            $this->employee->editEmployee($name, $contact, $id);
            header("Location: index.php?controller=main&action=main/employees/view");
            exit;
        }
        $currEmployee = $this->employee->getEmployee($id);
        require_once __DIR__ . '/../views/employee/employeeEdit.php';
    }

    public function insertEmployee($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $contact = $_POST['contact'];

            $this->employee->addEmployee($name, $contact);
            header("Location: index.php?controller=main&action=main/employees/view");
            exit;
        }
        require_once __DIR__ . '/../views/employee/employeeInsert.php';
    }

    public function items($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewItems($parts);
                break;
            case 'edit':
                $this->editItems($parts);
                break;
            case 'insert':
                $this->insertItems($parts);
                break;
        }
    }

    public function viewItems($parts)
    {
        $allItems = $this->item->getAllItems();
        $allCategories = $this->category->getAllCategories();
        require_once __DIR__ . '/../views/item/itemView.php';
    }

    public function editItems($parts)
    {
        $id = $parts[3] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $unitPrice = $_POST['price'];

            $this->item->editItem($name, $category, $unitPrice, $id);
            header("Location: index.php?controller=main&action=main/items/view");
            exit;
        }
        $currItem = $this->item->getItem($id);
        $allCategories = $this->category->getAllCategories();
        require_once __DIR__ . '/../views/item/itemEdit.php';
    }

    public function insertItems($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $unitPrice = $_POST['price'];

            $this->item->addItem($name, $category, $unitPrice);
            header("Location: index.php?controller=main&action=main/items/view");
            exit;
        }
        $allCategories = $this->category->getAllCategories();
        require_once __DIR__ . '/../views/item/itemInsert.php';
    }



    public function recievers($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewRecievers($parts);
                break;
            case 'edit':
                $this->editRecievers($parts);
                break;
            case 'insert':
                $this->insertRecievers($parts);
                break;
        }
    }

    public function viewRecievers($parts)
    {
        $allRecievers = $this->reciever->getAllRecievers();
        $allHospitals = $this->hospital->getAllHospitals();
        require_once __DIR__ . '/../views/reciever/recieverView.php';
    }

    public function editRecievers($parts)
    {
        $id = $parts[3] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $hospital = $_POST['hospital'];
            $contact = $_POST['contact'];

            $this->reciever->editReciever($name, $hospital, $contact, $id);
            header("Location: index.php?controller=main&action=main/recievers/view");
            exit;
        }
        $currReciever = $this->reciever->getReciever($id);
        $allHospitals = $this->hospital->getAllHospitals();
        require_once __DIR__ . '/../views/reciever/recieverEdit.php';
    }

    public function insertRecievers($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $hospital = $_POST['hospital'];
            $contact = $_POST['contact'];

            $this->reciever->addReciever($name, $hospital, $contact);
            header("Location: index.php?controller=main&action=main/recievers/view");
            exit;
        }
        $allHospitals = $this->hospital->getAllHospitals();
        require_once __DIR__ . '/../views/reciever/recieverInsert.php';
    }

    public function orders($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewOrders($parts);
                break;
            case 'edit':
                $this->editOrders($parts);
                break;
            case 'insert':
                $this->insertOrders($parts);
                break;
        }
    }

    public function viewOrders($parts)
    {
        $allOrders = $this->order->getAllOrders();
        require_once __DIR__ . '/../views/order/orderView.php';
    }

    public function editOrders($parts)
    {
        $id = $parts[3] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hospital = $_POST['hospital'];
            $employee = $_POST['employee'];
            $reciever = $_POST['reciever'];
            $order_method = $_POST['orderStatus'];
            $payment_method = $_POST['paymentMethod'];
            $payment_status = $_POST['paymentStatus'];
            $items = $_POST['items']; // array of selected items

            $this->order->editOrder($hospital, $employee, $reciever, $order_method, $payment_method, $payment_status, $items, $id);
            header("Location: index.php?controller=main&action=main/orders/view");
            exit;
        }
        $currOrder = $this->order->getOrder($id);
        $selectedItems = $this->order->getSelectedItems($id);
        $selectedItemsQty = $this->order->getSelectedItemsQty($id);

        $allRecievers = $this->reciever->getAllRecievers();
        $allHospitals = $this->hospital->getAllHospitals();
        $allEmployees = $this->employee->getAllEmployees();
        $allItems = $this->item->getAllItems();
        require_once __DIR__ . '/../views/order/orderEdit.php';
    }

    public function insertOrders($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hospital = $_POST['hospital'];
            $employee = $_POST['employee'];
            $reciever = $_POST['reciever'];
            $order_method = $_POST['orderStatus'];
            $payment_method = $_POST['paymentMethod'];
            $payment_status = $_POST['paymentStatus'];
            $items = $_POST['items']; // array of selected items

            $this->order->addOrder($hospital, $employee, $reciever, $order_method, $payment_method, $payment_status, $items);
            header("Location: index.php?controller=main&action=main/orders/view");
            exit;
        }
        $allRecievers = $this->reciever->getAllRecievers();
        $allHospitals = $this->hospital->getAllHospitals();
        $allEmployees = $this->employee->getAllEmployees();
        $allItems = $this->item->getAllItems();
        require_once __DIR__ . '/../views/order/orderInsert.php';
    }

    public function orderItems($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewOrderItems($parts);
                break;
            case 'edit':
                $this->editOrderItems($parts);
                break;
            case 'insert':
                $this->insertOrderItems($parts);
                break;
        }
    }

    public function viewOrderItems($parts)
    {
        $orderId = $parts[3] ?? '';
        $orderItems = $this->order->getOrderItems($orderId);
        require_once __DIR__ . '/../views/orderItem/orderItemView.php';
    }

    // public function editOrderItems($parts)
    // {
    //     $orderId = $parts[2];
    //     $orderItems = $this->order->getOrderItems($orderId);
    //     require_once __DIR__ . '/../views/orderItem/orderItemEdit.php';
    // }

    // public function insertOrderItems($parts)
    // {
    //     require_once __DIR__ . '/../views/orderItem/orderItemInsert.php';
    // }

        public function categories($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewCategory($parts);
                break;
            case 'edit':
                $this->editCategory($parts);
                break;
            case 'insert':
                $this->insertCategory($parts);
                break;
        }
    }

    public function viewCategory($parts)
    {
        $allCategories = $this->category->getAllCategories();
        require_once __DIR__ . '/../views/category/categoryView.php';
    }

    public function editCategory($parts)
    {
        $id = $parts[3] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            $this->category->editCategory($name, $id);
            header("Location: index.php?controller=main&action=main/categories/view");
            exit;
        }
        $currCategory = $this->category->getCategory($id);
        require_once __DIR__ . '/../views/category/categoryEdit.php';
    }

    public function insertCategory($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            $this->category->addCategory($name);
            header("Location: index.php?controller=main&action=main/categories/view");
            exit;
        }
        require_once __DIR__ . '/../views/category/categoryInsert.php';
    }



















    public function employeeForm($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phone = $_POST['phone'] ?? '';
            $shopname = $_POST['shopName'] ?? '';
            $address = $_POST['address'] ?? '';

            $this->vendor->addVendor($user_id, $shopname, $phone, $address);
            header("Location: index.php?controller=vendor&action=dashboard/primary");
            exit;
        }
        require_once __DIR__ . '/../views/commonElements/extendedFrom.php';
    }
    public function dashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['type'] !== 'vendor') {
            header("Location: index.php?controller=auth&action=handleLogin&type=staff");
            exit;
        }
        global $pdo;
        $path = $_GET['action'];
        $parts = explode('/', trim($path, '/'));

        $this->Vendor($parts);
    }

    public function handleitems($parts)
    {
        switch ($parts[2]) {
            case 'view':
                $this->viewItem($parts);
                break;
            case 'edit':
                $this->handleItem($parts);
                break;
            case 'add':
                $this->handleItem($parts);
                break;
            case 'delete':
                $this->deleteItem($parts);
                break;

        }
    }

    public function viewItem($parts)
    {
        $productId = $parts[3];
        $productDetails = $this->product->fetchProduct($productId);
        require_once __DIR__ . '/../views/Dashboards/Vendor/ViewItem.php';
    }

    public function deleteItem($parts)
    {
        $productId = $parts[3];
        $this->product->deleteProduct($productId);
        header("Location: index.php?controller=vendor&action=dashboard/inventory");
        exit;
    }


    public function handleItem($parts)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $category = $_POST['category'];
            $subcategory = $_POST['subcategory'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            // Handle file upload if user selected a new image
            $profilePicPath = []; // start with empty array

            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                $uploadDir = "resources/uploads/vendor/products/";
                if (!is_dir($uploadDir))
                    mkdir($uploadDir, 0777, true);
                $fileName = time() . "_" . basename($_FILES['images']['name'][$key]);
                $targetFile = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    // store the uploaded file path in array
                    $profilePicPath[] = $fileName;
                }
            }
            //$this->test($this->vendor->getVendorID($_SESSION['user']['id']), $title, $price, $description, $category, $subcategory, $profilePicPath);

            switch ($parts[2]) {
                case 'add':
                    $productID = $this->product->addProduct($this->vendor->getVendorID($_SESSION['user']['id']), $title, $price, $description, $category, $subcategory, $profilePicPath);
                    header("Location: index.php?controller=vendor&action=dashboard/item/view/$productID");
                    exit;
                case 'edit':
                    $this->product->editProduct(
                        $parts[3],       // product ID
                        $title,
                        $price,
                        $description,
                        $category,
                        $subcategory,
                        $profilePicPath
                    );
                    header("Location: index.php?controller=vendor&action=dashboard/item/view/" . urlencode($parts[3]));
                    exit;
                case 'edit2':
                    if ($profilePicPath == null) {
                        $profilePicPath = $this->product->fetchProductPic($parts[3]);
                    }
                    require_once __DIR__ . '/../views/Dashboards/Vendor/test.php';
            }
        }
        if ($parts[2] == 'edit') {
            $productId = $parts[3];
            $productDetails = $this->product->fetchProduct($productId);
        }
        $categories = $this->category->getCategory();
        $subcategories = $this->category->getAllSubcategory();
        require_once __DIR__ . '/../views/Dashboards/Vendor/EditItem.php';
    }

    public function ajaxCategory()
    {
        $categoryId = intval($_POST['category_id'] ?? 0);

        $subcategories = $this->category->getSubcategory($categoryId);

        header('Content-Type: application/json');
        echo json_encode($subcategories);

    }

    public function test($profilePicPath)
    {
        require_once __DIR__ . '/../views/Dashboards/Vendor/test.php';
    }

    public function showInventory($parts)
    {
        $allProducts = $this->product->fetchAllfromVendor($this->vendor->getVendorID($_SESSION['user']['id']));
        require_once __DIR__ . '/../views/Dashboards/Vendor/Inventory.php';
    }

    public function manageInventory($parts)
    {
        $products = $this->product->fetchAllfromVendor($this->vendor->getVendorID($_SESSION['user']['id']));
        $stock = $parts[2] ?? 'NULL';
        if ($stock === 'Total') {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $product_id = $_POST['productId'];
                $quantity = $_POST['quantity'];
                $state = $_GET['state'];
                if ($state === 'add') {
                    $this->product->addStock($product_id, $quantity);
                } else if ($state === 'sub') {
                    $this->product->substractStock($product_id, $quantity);
                }
                header("Location: index.php?controller=vendor&action=dashboard/manageInventory");
                exit;
            }
        } else if ($stock === 'Reserved') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $product_id = $_POST['productId'];
                $quantity = $_POST['quantity'];
                $state = $_GET['state'];
                if ($state === 'add') {
                    $this->product->addReserved($product_id, $quantity);
                } else if ($state === 'sub') {
                    $this->product->substractReserved($product_id, $quantity);
                }
                header("Location: index.php?controller=vendor&action=dashboard/manageInventory");
                exit;
            }
        }
        require_once __DIR__ . '/../views/Dashboards/Vendor/manageInventory.php';
    }

    public function handleLogout()
    {
        $_SESSION['vendor'] = null;
        header("Location: index.php?controller=auth&action=handleLogout");
        exit;
    }


}