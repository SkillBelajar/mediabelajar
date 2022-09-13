<?php

namespace PHPMaker2021\project1;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PesertaEdit extends Peserta
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'peserta';

    // Page object name
    public $PageObjName = "PesertaEdit";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
        return "";
    }

    // Page name
    public function pageName()
    {
        return CurrentPageName();
    }

    // Page URL
    public function pageUrl()
    {
        $url = ScriptName() . "?";
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
        return $url;
    }

    // Messages
    private $message = "";
    private $failureMessage = "";
    private $successMessage = "";
    private $warningMessage = "";

    // Get message
    public function getMessage()
    {
        return $_SESSION[SESSION_MESSAGE] ?? $this->message;
    }

    // Set message
    public function setMessage($v)
    {
        AddMessage($this->message, $v);
        $_SESSION[SESSION_MESSAGE] = $this->message;
    }

    // Get failure message
    public function getFailureMessage()
    {
        return $_SESSION[SESSION_FAILURE_MESSAGE] ?? $this->failureMessage;
    }

    // Set failure message
    public function setFailureMessage($v)
    {
        AddMessage($this->failureMessage, $v);
        $_SESSION[SESSION_FAILURE_MESSAGE] = $this->failureMessage;
    }

    // Get success message
    public function getSuccessMessage()
    {
        return $_SESSION[SESSION_SUCCESS_MESSAGE] ?? $this->successMessage;
    }

    // Set success message
    public function setSuccessMessage($v)
    {
        AddMessage($this->successMessage, $v);
        $_SESSION[SESSION_SUCCESS_MESSAGE] = $this->successMessage;
    }

    // Get warning message
    public function getWarningMessage()
    {
        return $_SESSION[SESSION_WARNING_MESSAGE] ?? $this->warningMessage;
    }

    // Set warning message
    public function setWarningMessage($v)
    {
        AddMessage($this->warningMessage, $v);
        $_SESSION[SESSION_WARNING_MESSAGE] = $this->warningMessage;
    }

    // Clear message
    public function clearMessage()
    {
        $this->message = "";
        $_SESSION[SESSION_MESSAGE] = "";
    }

    // Clear failure message
    public function clearFailureMessage()
    {
        $this->failureMessage = "";
        $_SESSION[SESSION_FAILURE_MESSAGE] = "";
    }

    // Clear success message
    public function clearSuccessMessage()
    {
        $this->successMessage = "";
        $_SESSION[SESSION_SUCCESS_MESSAGE] = "";
    }

    // Clear warning message
    public function clearWarningMessage()
    {
        $this->warningMessage = "";
        $_SESSION[SESSION_WARNING_MESSAGE] = "";
    }

    // Clear messages
    public function clearMessages()
    {
        $this->clearMessage();
        $this->clearFailureMessage();
        $this->clearSuccessMessage();
        $this->clearWarningMessage();
    }

    // Show message
    public function showMessage()
    {
        $hidden = true;
        $html = "";
        // Message
        $message = $this->getMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($message, "");
        }
        if ($message != "") { // Message in Session, display
            if (!$hidden) {
                $message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
            }
            $html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($warningMessage, "warning");
        }
        if ($warningMessage != "") { // Message in Session, display
            if (!$hidden) {
                $warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
            }
            $html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($successMessage, "success");
        }
        if ($successMessage != "") { // Message in Session, display
            if (!$hidden) {
                $successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
            }
            $html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $errorMessage = $this->getFailureMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($errorMessage, "failure");
        }
        if ($errorMessage != "") { // Message in Session, display
            if (!$hidden) {
                $errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
            }
            $html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        echo '<div class="ew-message-dialog' . ($hidden ? ' d-none' : '') . '">' . $html . '</div>';
    }

    // Get message as array
    public function getMessages()
    {
        $ar = [];
        // Message
        $message = $this->getMessage();
        if ($message != "") { // Message in Session, display
            $ar["message"] = $message;
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if ($warningMessage != "") { // Message in Session, display
            $ar["warningMessage"] = $warningMessage;
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if ($successMessage != "") { // Message in Session, display
            $ar["successMessage"] = $successMessage;
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $failureMessage = $this->getFailureMessage();
        if ($failureMessage != "") { // Message in Session, display
            $ar["failureMessage"] = $failureMessage;
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        return $ar;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;

        // Initialize
        $GLOBALS["Page"] = &$this;
        $this->TokenTimeout = SessionTimeoutTime();

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (peserta)
        if (!isset($GLOBALS["peserta"]) || get_class($GLOBALS["peserta"]) == PROJECT_NAMESPACE . "peserta") {
            $GLOBALS["peserta"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'peserta');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport;

        // Page is terminated
        $this->terminated = true;

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("peserta"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "PesertaView") {
                        $row["view"] = "1";
                    }
                } else { // List page should not be shown as modal => error
                    $row["error"] = $this->getFailureMessage();
                    $this->clearFailureMessage();
                }
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray($ar)
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue($ar)
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['id_peserta'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit()
    {
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id_peserta->Visible = false;
        }
    }

    // Lookup data
    public function lookup()
    {
        global $Language, $Security;

        // Get lookup object
        $fieldName = Post("field");
        if (!array_key_exists($fieldName, $this->Fields)) {
            return false;
        }
        $lookupField = $this->Fields[$fieldName];
        $lookup = $lookupField->Lookup;
        if ($lookup === null) {
            return false;
        }
        if (!$Security->isLoggedIn()) { // Logged in
            return false;
        }

        // Get lookup parameters
        $lookupType = Post("ajax", "unknown");
        $pageSize = -1;
        $offset = -1;
        $searchValue = "";
        if (SameText($lookupType, "modal")) {
            $searchValue = Post("sv", "");
            $pageSize = Post("recperpage", 10);
            $offset = Post("start", 0);
        } elseif (SameText($lookupType, "autosuggest")) {
            $searchValue = Param("q", "");
            $pageSize = Param("n", -1);
            $pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
            $start = Param("start", -1);
            $start = is_numeric($start) ? (int)$start : -1;
            $page = Param("page", -1);
            $page = is_numeric($page) ? (int)$page : -1;
            $offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
        }
        $userSelect = Decrypt(Post("s", ""));
        $userFilter = Decrypt(Post("f", ""));
        $userOrderBy = Decrypt(Post("o", ""));
        $keys = Post("keys");
        $lookup->LookupType = $lookupType; // Lookup type
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = Post("v" . $i, "");
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        $lookup->toJson($this); // Use settings from current page
    }
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $SkipHeaderFooter;

        // Is modal
        $this->IsModal = Param("modal") == "1";

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id_peserta->setVisibility();
        $this->tanggal_jam->setVisibility();
        $this->nama_peserta->setVisibility();
        $this->id_evaluasi->setVisibility();
        $this->benar->setVisibility();
        $this->jawaban_essai->setVisibility();
        $this->ip->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-edit-form ew-horizontal";
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id_peserta") ?? Key(0) ?? Route(2)) !== null) {
                $this->id_peserta->setQueryStringValue($keyValue);
                $this->id_peserta->setOldValue($this->id_peserta->QueryStringValue);
            } elseif (Post("id_peserta") !== null) {
                $this->id_peserta->setFormValue(Post("id_peserta"));
                $this->id_peserta->setOldValue($this->id_peserta->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Load key from Form
                if ($CurrentForm->hasValue("x_id_peserta")) {
                    $this->id_peserta->setFormValue($CurrentForm->getValue("x_id_peserta"));
                }
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id_peserta") ?? Route("id_peserta")) !== null) {
                    $this->id_peserta->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id_peserta->CurrentValue = null;
                }
            }

            // Set up master detail parameters
            $this->setupMasterParms();

            // Load current record
            $loaded = $this->loadRow();
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                if (!$loaded) { // Load record based on key
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("PesertaList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PesertaList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }
                    if (IsApi()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = ROWTYPE_EDIT; // Render as Edit
        $this->resetAttributes();
        $this->renderRow();

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Rendering event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id_peserta' first before field var 'x_id_peserta'
        $val = $CurrentForm->hasValue("id_peserta") ? $CurrentForm->getValue("id_peserta") : $CurrentForm->getValue("x_id_peserta");
        if (!$this->id_peserta->IsDetailKey) {
            $this->id_peserta->setFormValue($val);
        }

        // Check field name 'tanggal_jam' first before field var 'x_tanggal_jam'
        $val = $CurrentForm->hasValue("tanggal_jam") ? $CurrentForm->getValue("tanggal_jam") : $CurrentForm->getValue("x_tanggal_jam");
        if (!$this->tanggal_jam->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->tanggal_jam->Visible = false; // Disable update for API request
            } else {
                $this->tanggal_jam->setFormValue($val);
            }
        }

        // Check field name 'nama_peserta' first before field var 'x_nama_peserta'
        $val = $CurrentForm->hasValue("nama_peserta") ? $CurrentForm->getValue("nama_peserta") : $CurrentForm->getValue("x_nama_peserta");
        if (!$this->nama_peserta->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->nama_peserta->Visible = false; // Disable update for API request
            } else {
                $this->nama_peserta->setFormValue($val);
            }
        }

        // Check field name 'id_evaluasi' first before field var 'x_id_evaluasi'
        $val = $CurrentForm->hasValue("id_evaluasi") ? $CurrentForm->getValue("id_evaluasi") : $CurrentForm->getValue("x_id_evaluasi");
        if (!$this->id_evaluasi->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->id_evaluasi->Visible = false; // Disable update for API request
            } else {
                $this->id_evaluasi->setFormValue($val);
            }
        }

        // Check field name 'benar' first before field var 'x_benar'
        $val = $CurrentForm->hasValue("benar") ? $CurrentForm->getValue("benar") : $CurrentForm->getValue("x_benar");
        if (!$this->benar->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->benar->Visible = false; // Disable update for API request
            } else {
                $this->benar->setFormValue($val);
            }
        }

        // Check field name 'jawaban_essai' first before field var 'x_jawaban_essai'
        $val = $CurrentForm->hasValue("jawaban_essai") ? $CurrentForm->getValue("jawaban_essai") : $CurrentForm->getValue("x_jawaban_essai");
        if (!$this->jawaban_essai->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->jawaban_essai->Visible = false; // Disable update for API request
            } else {
                $this->jawaban_essai->setFormValue($val);
            }
        }

        // Check field name 'ip' first before field var 'x_ip'
        $val = $CurrentForm->hasValue("ip") ? $CurrentForm->getValue("ip") : $CurrentForm->getValue("x_ip");
        if (!$this->ip->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ip->Visible = false; // Disable update for API request
            } else {
                $this->ip->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id_peserta->CurrentValue = $this->id_peserta->FormValue;
        $this->tanggal_jam->CurrentValue = $this->tanggal_jam->FormValue;
        $this->nama_peserta->CurrentValue = $this->nama_peserta->FormValue;
        $this->id_evaluasi->CurrentValue = $this->id_evaluasi->FormValue;
        $this->benar->CurrentValue = $this->benar->FormValue;
        $this->jawaban_essai->CurrentValue = $this->jawaban_essai->FormValue;
        $this->ip->CurrentValue = $this->ip->FormValue;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->id_peserta->setDbValue($row['id_peserta']);
        $this->tanggal_jam->setDbValue($row['tanggal_jam']);
        $this->nama_peserta->setDbValue($row['nama_peserta']);
        $this->id_evaluasi->setDbValue($row['id_evaluasi']);
        $this->benar->setDbValue($row['benar']);
        $this->jawaban_essai->setDbValue($row['jawaban_essai']);
        $this->ip->setDbValue($row['ip']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id_peserta'] = null;
        $row['tanggal_jam'] = null;
        $row['nama_peserta'] = null;
        $row['id_evaluasi'] = null;
        $row['benar'] = null;
        $row['jawaban_essai'] = null;
        $row['ip'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("id_peserta")) != "") {
            $this->id_peserta->OldValue = $this->getKey("id_peserta"); // id_peserta
        } else {
            $validKey = false;
        }

        // Load old record
        $this->OldRecordset = null;
        if ($validKey) {
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $this->OldRecordset = LoadRecordset($sql, $conn);
        }
        $this->loadRowValues($this->OldRecordset); // Load row values
        return $validKey;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id_peserta

        // tanggal_jam

        // nama_peserta

        // id_evaluasi

        // benar

        // jawaban_essai

        // ip
        if ($this->RowType == ROWTYPE_VIEW) {
            // id_peserta
            $this->id_peserta->ViewValue = $this->id_peserta->CurrentValue;
            $this->id_peserta->ViewCustomAttributes = "";

            // tanggal_jam
            $this->tanggal_jam->ViewValue = $this->tanggal_jam->CurrentValue;
            $this->tanggal_jam->ViewCustomAttributes = "";

            // nama_peserta
            $this->nama_peserta->ViewValue = $this->nama_peserta->CurrentValue;
            $this->nama_peserta->ViewCustomAttributes = "";

            // id_evaluasi
            $this->id_evaluasi->ViewValue = $this->id_evaluasi->CurrentValue;
            $this->id_evaluasi->ViewValue = FormatNumber($this->id_evaluasi->ViewValue, 0, -2, -2, -2);
            $this->id_evaluasi->ViewCustomAttributes = "";

            // benar
            $this->benar->ViewValue = $this->benar->CurrentValue;
            $this->benar->ViewCustomAttributes = "";

            // jawaban_essai
            $this->jawaban_essai->ViewValue = $this->jawaban_essai->CurrentValue;
            $this->jawaban_essai->ViewCustomAttributes = "";

            // ip
            $this->ip->ViewValue = $this->ip->CurrentValue;
            $this->ip->ViewCustomAttributes = "";

            // id_peserta
            $this->id_peserta->LinkCustomAttributes = "";
            $this->id_peserta->HrefValue = "";
            $this->id_peserta->TooltipValue = "";

            // tanggal_jam
            $this->tanggal_jam->LinkCustomAttributes = "";
            $this->tanggal_jam->HrefValue = "";
            $this->tanggal_jam->TooltipValue = "";

            // nama_peserta
            $this->nama_peserta->LinkCustomAttributes = "";
            $this->nama_peserta->HrefValue = "";
            $this->nama_peserta->TooltipValue = "";

            // id_evaluasi
            $this->id_evaluasi->LinkCustomAttributes = "";
            $this->id_evaluasi->HrefValue = "";
            $this->id_evaluasi->TooltipValue = "";

            // benar
            $this->benar->LinkCustomAttributes = "";
            $this->benar->HrefValue = "";
            $this->benar->TooltipValue = "";

            // jawaban_essai
            $this->jawaban_essai->LinkCustomAttributes = "";
            $this->jawaban_essai->HrefValue = "";
            $this->jawaban_essai->TooltipValue = "";

            // ip
            $this->ip->LinkCustomAttributes = "";
            $this->ip->HrefValue = "";
            $this->ip->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id_peserta
            $this->id_peserta->EditAttrs["class"] = "form-control";
            $this->id_peserta->EditCustomAttributes = "";
            $this->id_peserta->EditValue = $this->id_peserta->CurrentValue;
            $this->id_peserta->ViewCustomAttributes = "";

            // tanggal_jam
            $this->tanggal_jam->EditAttrs["class"] = "form-control";
            $this->tanggal_jam->EditCustomAttributes = "";
            if (!$this->tanggal_jam->Raw) {
                $this->tanggal_jam->CurrentValue = HtmlDecode($this->tanggal_jam->CurrentValue);
            }
            $this->tanggal_jam->EditValue = HtmlEncode($this->tanggal_jam->CurrentValue);
            $this->tanggal_jam->PlaceHolder = RemoveHtml($this->tanggal_jam->caption());

            // nama_peserta
            $this->nama_peserta->EditAttrs["class"] = "form-control";
            $this->nama_peserta->EditCustomAttributes = "";
            if (!$this->nama_peserta->Raw) {
                $this->nama_peserta->CurrentValue = HtmlDecode($this->nama_peserta->CurrentValue);
            }
            $this->nama_peserta->EditValue = HtmlEncode($this->nama_peserta->CurrentValue);
            $this->nama_peserta->PlaceHolder = RemoveHtml($this->nama_peserta->caption());

            // id_evaluasi
            $this->id_evaluasi->EditAttrs["class"] = "form-control";
            $this->id_evaluasi->EditCustomAttributes = "";
            if ($this->id_evaluasi->getSessionValue() != "") {
                $this->id_evaluasi->CurrentValue = GetForeignKeyValue($this->id_evaluasi->getSessionValue());
                $this->id_evaluasi->ViewValue = $this->id_evaluasi->CurrentValue;
                $this->id_evaluasi->ViewValue = FormatNumber($this->id_evaluasi->ViewValue, 0, -2, -2, -2);
                $this->id_evaluasi->ViewCustomAttributes = "";
            } else {
                $this->id_evaluasi->EditValue = HtmlEncode($this->id_evaluasi->CurrentValue);
                $this->id_evaluasi->PlaceHolder = RemoveHtml($this->id_evaluasi->caption());
            }

            // benar
            $this->benar->EditAttrs["class"] = "form-control";
            $this->benar->EditCustomAttributes = "";
            if (!$this->benar->Raw) {
                $this->benar->CurrentValue = HtmlDecode($this->benar->CurrentValue);
            }
            $this->benar->EditValue = HtmlEncode($this->benar->CurrentValue);
            $this->benar->PlaceHolder = RemoveHtml($this->benar->caption());

            // jawaban_essai
            $this->jawaban_essai->EditAttrs["class"] = "form-control";
            $this->jawaban_essai->EditCustomAttributes = "";
            $this->jawaban_essai->EditValue = HtmlEncode($this->jawaban_essai->CurrentValue);
            $this->jawaban_essai->PlaceHolder = RemoveHtml($this->jawaban_essai->caption());

            // ip
            $this->ip->EditAttrs["class"] = "form-control";
            $this->ip->EditCustomAttributes = "";
            if (!$this->ip->Raw) {
                $this->ip->CurrentValue = HtmlDecode($this->ip->CurrentValue);
            }
            $this->ip->EditValue = HtmlEncode($this->ip->CurrentValue);
            $this->ip->PlaceHolder = RemoveHtml($this->ip->caption());

            // Edit refer script

            // id_peserta
            $this->id_peserta->LinkCustomAttributes = "";
            $this->id_peserta->HrefValue = "";

            // tanggal_jam
            $this->tanggal_jam->LinkCustomAttributes = "";
            $this->tanggal_jam->HrefValue = "";

            // nama_peserta
            $this->nama_peserta->LinkCustomAttributes = "";
            $this->nama_peserta->HrefValue = "";

            // id_evaluasi
            $this->id_evaluasi->LinkCustomAttributes = "";
            $this->id_evaluasi->HrefValue = "";

            // benar
            $this->benar->LinkCustomAttributes = "";
            $this->benar->HrefValue = "";

            // jawaban_essai
            $this->jawaban_essai->LinkCustomAttributes = "";
            $this->jawaban_essai->HrefValue = "";

            // ip
            $this->ip->LinkCustomAttributes = "";
            $this->ip->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->id_peserta->Required) {
            if (!$this->id_peserta->IsDetailKey && EmptyValue($this->id_peserta->FormValue)) {
                $this->id_peserta->addErrorMessage(str_replace("%s", $this->id_peserta->caption(), $this->id_peserta->RequiredErrorMessage));
            }
        }
        if ($this->tanggal_jam->Required) {
            if (!$this->tanggal_jam->IsDetailKey && EmptyValue($this->tanggal_jam->FormValue)) {
                $this->tanggal_jam->addErrorMessage(str_replace("%s", $this->tanggal_jam->caption(), $this->tanggal_jam->RequiredErrorMessage));
            }
        }
        if ($this->nama_peserta->Required) {
            if (!$this->nama_peserta->IsDetailKey && EmptyValue($this->nama_peserta->FormValue)) {
                $this->nama_peserta->addErrorMessage(str_replace("%s", $this->nama_peserta->caption(), $this->nama_peserta->RequiredErrorMessage));
            }
        }
        if ($this->id_evaluasi->Required) {
            if (!$this->id_evaluasi->IsDetailKey && EmptyValue($this->id_evaluasi->FormValue)) {
                $this->id_evaluasi->addErrorMessage(str_replace("%s", $this->id_evaluasi->caption(), $this->id_evaluasi->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->id_evaluasi->FormValue)) {
            $this->id_evaluasi->addErrorMessage($this->id_evaluasi->getErrorMessage(false));
        }
        if ($this->benar->Required) {
            if (!$this->benar->IsDetailKey && EmptyValue($this->benar->FormValue)) {
                $this->benar->addErrorMessage(str_replace("%s", $this->benar->caption(), $this->benar->RequiredErrorMessage));
            }
        }
        if ($this->jawaban_essai->Required) {
            if (!$this->jawaban_essai->IsDetailKey && EmptyValue($this->jawaban_essai->FormValue)) {
                $this->jawaban_essai->addErrorMessage(str_replace("%s", $this->jawaban_essai->caption(), $this->jawaban_essai->RequiredErrorMessage));
            }
        }
        if ($this->ip->Required) {
            if (!$this->ip->IsDetailKey && EmptyValue($this->ip->FormValue)) {
                $this->ip->addErrorMessage(str_replace("%s", $this->ip->caption(), $this->ip->RequiredErrorMessage));
            }
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // tanggal_jam
            $this->tanggal_jam->setDbValueDef($rsnew, $this->tanggal_jam->CurrentValue, "", $this->tanggal_jam->ReadOnly);

            // nama_peserta
            $this->nama_peserta->setDbValueDef($rsnew, $this->nama_peserta->CurrentValue, "", $this->nama_peserta->ReadOnly);

            // id_evaluasi
            $this->id_evaluasi->setDbValueDef($rsnew, $this->id_evaluasi->CurrentValue, 0, $this->id_evaluasi->ReadOnly);

            // benar
            $this->benar->setDbValueDef($rsnew, $this->benar->CurrentValue, "", $this->benar->ReadOnly);

            // jawaban_essai
            $this->jawaban_essai->setDbValueDef($rsnew, $this->jawaban_essai->CurrentValue, "", $this->jawaban_essai->ReadOnly);

            // ip
            $this->ip->setDbValueDef($rsnew, $this->ip->CurrentValue, "", $this->ip->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);

            // Check for duplicate key when key changed
            if ($updateRow) {
                $newKeyFilter = $this->getRecordFilter($rsnew);
                if ($newKeyFilter != $oldKeyFilter) {
                    $rsChk = $this->loadRs($newKeyFilter)->fetch();
                    if ($rsChk !== false) {
                        $keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
                        $this->setFailureMessage($keyErrMsg);
                        $updateRow = false;
                    }
                }
            }
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    $editRow = $this->update($rsnew, "", $rsold);
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "evaluasi") {
                $validMaster = true;
                $masterTbl = Container("evaluasi");
                if (($parm = Get("fk_id_evaluasi", Get("id_evaluasi"))) !== null) {
                    $masterTbl->id_evaluasi->setQueryStringValue($parm);
                    $this->id_evaluasi->setQueryStringValue($masterTbl->id_evaluasi->QueryStringValue);
                    $this->id_evaluasi->setSessionValue($this->id_evaluasi->QueryStringValue);
                    if (!is_numeric($masterTbl->id_evaluasi->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "evaluasi") {
                $validMaster = true;
                $masterTbl = Container("evaluasi");
                if (($parm = Post("fk_id_evaluasi", Post("id_evaluasi"))) !== null) {
                    $masterTbl->id_evaluasi->setFormValue($parm);
                    $this->id_evaluasi->setFormValue($masterTbl->id_evaluasi->FormValue);
                    $this->id_evaluasi->setSessionValue($this->id_evaluasi->FormValue);
                    if (!is_numeric($masterTbl->id_evaluasi->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);
            $this->setSessionWhere($this->getDetailFilter());

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "evaluasi") {
                if ($this->id_evaluasi->CurrentValue == "") {
                    $this->id_evaluasi->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PesertaList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        if ($this->isPageRequest()) { // Validate request
            $startRec = Get(Config("TABLE_START_REC"));
            $pageNo = Get(Config("TABLE_PAGE_NO"));
            if ($pageNo !== null) { // Check for "pageno" parameter first
                if (is_numeric($pageNo)) {
                    $this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
                    if ($this->StartRecord <= 0) {
                        $this->StartRecord = 1;
                    } elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1) {
                        $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1;
                    }
                    $this->setStartRecordNumber($this->StartRecord);
                }
            } elseif ($startRec !== null) { // Check for "start" parameter
                $this->StartRecord = $startRec;
                $this->setStartRecordNumber($this->StartRecord);
            }
        }
        $this->StartRecord = $this->getStartRecordNumber();

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
            $this->setStartRecordNumber($this->StartRecord);
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
        if ($type == 'success') {
            //$msg = "your success message";
        } elseif ($type == 'failure') {
            //$msg = "your failure message";
        } elseif ($type == 'warning') {
            //$msg = "your warning message";
        } else {
            //$msg = "your message";
        }
    }

    // Page Render event
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
    }
}
