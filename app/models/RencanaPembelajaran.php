<?php

namespace PHPMaker2021\project1;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for rencana_pembelajaran
 */
class RencanaPembelajaran extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $id_rencana_pembelajaran;
    public $id_indikator;
    public $id_materi;
    public $kegiatan;
    public $waktu;
    public $tampilkan;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'rencana_pembelajaran';
        $this->TableName = 'rencana_pembelajaran';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`rencana_pembelajaran`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id_rencana_pembelajaran
        $this->id_rencana_pembelajaran = new DbField('rencana_pembelajaran', 'rencana_pembelajaran', 'x_id_rencana_pembelajaran', 'id_rencana_pembelajaran', '`id_rencana_pembelajaran`', '`id_rencana_pembelajaran`', 3, 100, -1, false, '`id_rencana_pembelajaran`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id_rencana_pembelajaran->IsAutoIncrement = true; // Autoincrement field
        $this->id_rencana_pembelajaran->IsPrimaryKey = true; // Primary key field
        $this->id_rencana_pembelajaran->Sortable = true; // Allow sort
        $this->id_rencana_pembelajaran->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id_rencana_pembelajaran'] = &$this->id_rencana_pembelajaran;

        // id_indikator
        $this->id_indikator = new DbField('rencana_pembelajaran', 'rencana_pembelajaran', 'x_id_indikator', 'id_indikator', '`id_indikator`', '`id_indikator`', 3, 100, -1, false, '`id_indikator`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->id_indikator->IsForeignKey = true; // Foreign key field
        $this->id_indikator->Nullable = false; // NOT NULL field
        $this->id_indikator->Required = true; // Required field
        $this->id_indikator->Sortable = true; // Allow sort
        $this->id_indikator->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->id_indikator->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->id_indikator->Lookup = new Lookup('id_indikator', 'indikator_rencana_belajar', false, 'id_indikator', ["kategori","indikator","",""], [], [], [], [], [], [], '', '');
        $this->id_indikator->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id_indikator'] = &$this->id_indikator;

        // id_materi
        $this->id_materi = new DbField('rencana_pembelajaran', 'rencana_pembelajaran', 'x_id_materi', 'id_materi', '`id_materi`', '`id_materi`', 3, 100, -1, false, '`id_materi`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->id_materi->IsForeignKey = true; // Foreign key field
        $this->id_materi->Nullable = false; // NOT NULL field
        $this->id_materi->Required = true; // Required field
        $this->id_materi->Sortable = true; // Allow sort
        $this->id_materi->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->id_materi->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->id_materi->Lookup = new Lookup('id_materi', 'materi', false, 'id_materi', ["judul","","",""], [], [], [], [], [], [], '', '');
        $this->id_materi->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['id_materi'] = &$this->id_materi;

        // kegiatan
        $this->kegiatan = new DbField('rencana_pembelajaran', 'rencana_pembelajaran', 'x_kegiatan', 'kegiatan', '`kegiatan`', '`kegiatan`', 201, 65535, -1, false, '`kegiatan`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->kegiatan->Nullable = false; // NOT NULL field
        $this->kegiatan->Required = true; // Required field
        $this->kegiatan->Sortable = true; // Allow sort
        $this->Fields['kegiatan'] = &$this->kegiatan;

        // waktu
        $this->waktu = new DbField('rencana_pembelajaran', 'rencana_pembelajaran', 'x_waktu', 'waktu', '`waktu`', '`waktu`', 3, 100, -1, false, '`waktu`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->waktu->Nullable = false; // NOT NULL field
        $this->waktu->Required = true; // Required field
        $this->waktu->Sortable = true; // Allow sort
        $this->waktu->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['waktu'] = &$this->waktu;

        // tampilkan
        $this->tampilkan = new DbField('rencana_pembelajaran', 'rencana_pembelajaran', 'x_tampilkan', 'tampilkan', '`tampilkan`', '`tampilkan`', 3, 100, -1, false, '`tampilkan`', false, false, false, 'FORMATTED TEXT', 'SELECT');
        $this->tampilkan->Nullable = false; // NOT NULL field
        $this->tampilkan->Required = true; // Required field
        $this->tampilkan->Sortable = true; // Allow sort
        $this->tampilkan->UsePleaseSelect = true; // Use PleaseSelect by default
        $this->tampilkan->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
        $this->tampilkan->Lookup = new Lookup('tampilkan', 'rencana_pembelajaran', false, '', ["","","",""], [], [], [], [], [], [], '', '');
        $this->tampilkan->OptionCount = 2;
        $this->tampilkan->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['tampilkan'] = &$this->tampilkan;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Current master table name
    public function getCurrentMasterTable()
    {
        return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Session master WHERE clause
    public function getMasterFilter()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "indikator_rencana_belajar") {
            if ($this->id_indikator->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id_indikator`", $this->id_indikator->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        if ($this->getCurrentMasterTable() == "materi") {
            if ($this->id_materi->getSessionValue() != "") {
                $masterFilter .= "" . GetForeignKeySql("`id_materi`", $this->id_materi->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Session detail WHERE clause
    public function getDetailFilter()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "indikator_rencana_belajar") {
            if ($this->id_indikator->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`id_indikator`", $this->id_indikator->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        if ($this->getCurrentMasterTable() == "materi") {
            if ($this->id_materi->getSessionValue() != "") {
                $detailFilter .= "" . GetForeignKeySql("`id_materi`", $this->id_materi->getSessionValue(), DATATYPE_NUMBER, "DB");
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    // Master filter
    public function sqlMasterFilter_indikator_rencana_belajar()
    {
        return "`id_indikator`=@id_indikator@";
    }
    // Detail filter
    public function sqlDetailFilter_indikator_rencana_belajar()
    {
        return "`id_indikator`=@id_indikator@";
    }

    // Master filter
    public function sqlMasterFilter_materi()
    {
        return "`id_materi`=@id_materi@";
    }
    // Detail filter
    public function sqlDetailFilter_materi()
    {
        return "`id_materi`=@id_materi@";
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`rencana_pembelajaran`";
    }

    public function sqlFrom() // For backward compatibility
    {
        return $this->getSqlFrom();
    }

    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
    }

    public function sqlSelect() // For backward compatibility
    {
        return $this->getSqlSelect();
    }

    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    public function sqlWhere() // For backward compatibility
    {
        return $this->getSqlWhere();
    }

    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    public function getSqlGroupBy() // Group By
    {
        return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
    }

    public function sqlGroupBy() // For backward compatibility
    {
        return $this->getSqlGroupBy();
    }

    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    public function sqlHaving() // For backward compatibility
    {
        return $this->getSqlHaving();
    }

    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    public function getSqlOrderBy() // Order By
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
    }

    public function sqlOrderBy() // For backward compatibility
    {
        return $this->getSqlOrderBy();
    }

    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter)
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return (($allow & 1) == 1);
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return (($allow & 4) == 4);
            case "delete":
                return (($allow & 2) == 2);
            case "view":
                return (($allow & 32) == 32);
            case "search":
                return (($allow & 64) == 64);
            default:
                return (($allow & 8) == 8);
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->id_rencana_pembelajaran->setDbValue($conn->lastInsertId());
            $rs['id_rencana_pembelajaran'] = $this->id_rencana_pembelajaran->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id_rencana_pembelajaran', $rs)) {
                AddFilter($where, QuotedName('id_rencana_pembelajaran', $this->Dbid) . '=' . QuotedValue($rs['id_rencana_pembelajaran'], $this->id_rencana_pembelajaran->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id_rencana_pembelajaran->DbValue = $row['id_rencana_pembelajaran'];
        $this->id_indikator->DbValue = $row['id_indikator'];
        $this->id_materi->DbValue = $row['id_materi'];
        $this->kegiatan->DbValue = $row['kegiatan'];
        $this->waktu->DbValue = $row['waktu'];
        $this->tampilkan->DbValue = $row['tampilkan'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`id_rencana_pembelajaran` = @id_rencana_pembelajaran@";
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id_rencana_pembelajaran', $row) ? $row['id_rencana_pembelajaran'] : null;
        } else {
            $val = $this->id_rencana_pembelajaran->OldValue !== null ? $this->id_rencana_pembelajaran->OldValue : $this->id_rencana_pembelajaran->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id_rencana_pembelajaran@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("RencanaPembelajaranList");
        }
    }

    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "RencanaPembelajaranView") {
            return $Language->phrase("View");
        } elseif ($pageName == "RencanaPembelajaranEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "RencanaPembelajaranAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "RencanaPembelajaranList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("RencanaPembelajaranView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("RencanaPembelajaranView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "RencanaPembelajaranAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "RencanaPembelajaranAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("RencanaPembelajaranEdit", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        $url = $this->keyUrl("RencanaPembelajaranAdd", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl()
    {
        return $this->keyUrl("RencanaPembelajaranDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "indikator_rencana_belajar" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id_indikator", $this->id_indikator->CurrentValue);
        }
        if ($this->getCurrentMasterTable() == "materi" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id_materi", $this->id_materi->CurrentValue);
        }
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "id_rencana_pembelajaran:" . JsonEncode($this->id_rencana_pembelajaran->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id_rencana_pembelajaran->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id_rencana_pembelajaran->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
            return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("id_rencana_pembelajaran") ?? Route("id_rencana_pembelajaran")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id_rencana_pembelajaran->CurrentValue = $key;
            } else {
                $this->id_rencana_pembelajaran->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id_rencana_pembelajaran->setDbValue($row['id_rencana_pembelajaran']);
        $this->id_indikator->setDbValue($row['id_indikator']);
        $this->id_materi->setDbValue($row['id_materi']);
        $this->kegiatan->setDbValue($row['kegiatan']);
        $this->waktu->setDbValue($row['waktu']);
        $this->tampilkan->setDbValue($row['tampilkan']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id_rencana_pembelajaran

        // id_indikator

        // id_materi

        // kegiatan

        // waktu

        // tampilkan

        // id_rencana_pembelajaran
        $this->id_rencana_pembelajaran->ViewValue = $this->id_rencana_pembelajaran->CurrentValue;
        $this->id_rencana_pembelajaran->ViewCustomAttributes = "";

        // id_indikator
        $curVal = strval($this->id_indikator->CurrentValue);
        if ($curVal != "") {
            $this->id_indikator->ViewValue = $this->id_indikator->lookupCacheOption($curVal);
            if ($this->id_indikator->ViewValue === null) { // Lookup from database
                $filterWrk = "`id_indikator`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->id_indikator->Lookup->getSql(false, $filterWrk, '', $this, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->id_indikator->Lookup->renderViewRow($rswrk[0]);
                    $this->id_indikator->ViewValue = $this->id_indikator->displayValue($arwrk);
                } else {
                    $this->id_indikator->ViewValue = $this->id_indikator->CurrentValue;
                }
            }
        } else {
            $this->id_indikator->ViewValue = null;
        }
        $this->id_indikator->ViewCustomAttributes = "";

        // id_materi
        $curVal = strval($this->id_materi->CurrentValue);
        if ($curVal != "") {
            $this->id_materi->ViewValue = $this->id_materi->lookupCacheOption($curVal);
            if ($this->id_materi->ViewValue === null) { // Lookup from database
                $filterWrk = "`id_materi`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                $sqlWrk = $this->id_materi->Lookup->getSql(false, $filterWrk, '', $this, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->id_materi->Lookup->renderViewRow($rswrk[0]);
                    $this->id_materi->ViewValue = $this->id_materi->displayValue($arwrk);
                } else {
                    $this->id_materi->ViewValue = $this->id_materi->CurrentValue;
                }
            }
        } else {
            $this->id_materi->ViewValue = null;
        }
        $this->id_materi->ViewCustomAttributes = "";

        // kegiatan
        $this->kegiatan->ViewValue = $this->kegiatan->CurrentValue;
        $this->kegiatan->ViewCustomAttributes = "";

        // waktu
        $this->waktu->ViewValue = $this->waktu->CurrentValue;
        $this->waktu->ViewValue = FormatNumber($this->waktu->ViewValue, 0, -2, -2, -2);
        $this->waktu->ViewCustomAttributes = "";

        // tampilkan
        if (strval($this->tampilkan->CurrentValue) != "") {
            $this->tampilkan->ViewValue = $this->tampilkan->optionCaption($this->tampilkan->CurrentValue);
        } else {
            $this->tampilkan->ViewValue = null;
        }
        $this->tampilkan->ViewCustomAttributes = "";

        // id_rencana_pembelajaran
        $this->id_rencana_pembelajaran->LinkCustomAttributes = "";
        $this->id_rencana_pembelajaran->HrefValue = "";
        $this->id_rencana_pembelajaran->TooltipValue = "";

        // id_indikator
        $this->id_indikator->LinkCustomAttributes = "";
        $this->id_indikator->HrefValue = "";
        $this->id_indikator->TooltipValue = "";

        // id_materi
        $this->id_materi->LinkCustomAttributes = "";
        $this->id_materi->HrefValue = "";
        $this->id_materi->TooltipValue = "";

        // kegiatan
        $this->kegiatan->LinkCustomAttributes = "";
        $this->kegiatan->HrefValue = "";
        $this->kegiatan->TooltipValue = "";

        // waktu
        $this->waktu->LinkCustomAttributes = "";
        $this->waktu->HrefValue = "";
        $this->waktu->TooltipValue = "";

        // tampilkan
        $this->tampilkan->LinkCustomAttributes = "";
        $this->tampilkan->HrefValue = "";
        $this->tampilkan->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id_rencana_pembelajaran
        $this->id_rencana_pembelajaran->EditAttrs["class"] = "form-control";
        $this->id_rencana_pembelajaran->EditCustomAttributes = "";
        $this->id_rencana_pembelajaran->EditValue = $this->id_rencana_pembelajaran->CurrentValue;
        $this->id_rencana_pembelajaran->ViewCustomAttributes = "";

        // id_indikator
        $this->id_indikator->EditAttrs["class"] = "form-control";
        $this->id_indikator->EditCustomAttributes = "";
        if ($this->id_indikator->getSessionValue() != "") {
            $this->id_indikator->CurrentValue = GetForeignKeyValue($this->id_indikator->getSessionValue());
            $curVal = strval($this->id_indikator->CurrentValue);
            if ($curVal != "") {
                $this->id_indikator->ViewValue = $this->id_indikator->lookupCacheOption($curVal);
                if ($this->id_indikator->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id_indikator`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->id_indikator->Lookup->getSql(false, $filterWrk, '', $this, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->id_indikator->Lookup->renderViewRow($rswrk[0]);
                        $this->id_indikator->ViewValue = $this->id_indikator->displayValue($arwrk);
                    } else {
                        $this->id_indikator->ViewValue = $this->id_indikator->CurrentValue;
                    }
                }
            } else {
                $this->id_indikator->ViewValue = null;
            }
            $this->id_indikator->ViewCustomAttributes = "";
        } else {
            $this->id_indikator->PlaceHolder = RemoveHtml($this->id_indikator->caption());
        }

        // id_materi
        $this->id_materi->EditAttrs["class"] = "form-control";
        $this->id_materi->EditCustomAttributes = "";
        if ($this->id_materi->getSessionValue() != "") {
            $this->id_materi->CurrentValue = GetForeignKeyValue($this->id_materi->getSessionValue());
            $curVal = strval($this->id_materi->CurrentValue);
            if ($curVal != "") {
                $this->id_materi->ViewValue = $this->id_materi->lookupCacheOption($curVal);
                if ($this->id_materi->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id_materi`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->id_materi->Lookup->getSql(false, $filterWrk, '', $this, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->id_materi->Lookup->renderViewRow($rswrk[0]);
                        $this->id_materi->ViewValue = $this->id_materi->displayValue($arwrk);
                    } else {
                        $this->id_materi->ViewValue = $this->id_materi->CurrentValue;
                    }
                }
            } else {
                $this->id_materi->ViewValue = null;
            }
            $this->id_materi->ViewCustomAttributes = "";
        } else {
            $this->id_materi->PlaceHolder = RemoveHtml($this->id_materi->caption());
        }

        // kegiatan
        $this->kegiatan->EditAttrs["class"] = "form-control";
        $this->kegiatan->EditCustomAttributes = "";
        $this->kegiatan->EditValue = $this->kegiatan->CurrentValue;
        $this->kegiatan->PlaceHolder = RemoveHtml($this->kegiatan->caption());

        // waktu
        $this->waktu->EditAttrs["class"] = "form-control";
        $this->waktu->EditCustomAttributes = "";
        $this->waktu->EditValue = $this->waktu->CurrentValue;
        $this->waktu->PlaceHolder = RemoveHtml($this->waktu->caption());

        // tampilkan
        $this->tampilkan->EditAttrs["class"] = "form-control";
        $this->tampilkan->EditCustomAttributes = "";
        $this->tampilkan->EditValue = $this->tampilkan->options(true);
        $this->tampilkan->PlaceHolder = RemoveHtml($this->tampilkan->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id_rencana_pembelajaran);
                    $doc->exportCaption($this->id_indikator);
                    $doc->exportCaption($this->id_materi);
                    $doc->exportCaption($this->kegiatan);
                    $doc->exportCaption($this->waktu);
                    $doc->exportCaption($this->tampilkan);
                } else {
                    $doc->exportCaption($this->id_rencana_pembelajaran);
                    $doc->exportCaption($this->id_indikator);
                    $doc->exportCaption($this->id_materi);
                    $doc->exportCaption($this->waktu);
                    $doc->exportCaption($this->tampilkan);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id_rencana_pembelajaran);
                        $doc->exportField($this->id_indikator);
                        $doc->exportField($this->id_materi);
                        $doc->exportField($this->kegiatan);
                        $doc->exportField($this->waktu);
                        $doc->exportField($this->tampilkan);
                    } else {
                        $doc->exportField($this->id_rencana_pembelajaran);
                        $doc->exportField($this->id_indikator);
                        $doc->exportField($this->id_materi);
                        $doc->exportField($this->waktu);
                        $doc->exportField($this->tampilkan);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
