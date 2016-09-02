<?php

namespace Map;

use \Client;
use \ClientQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'client' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ClientTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ClientTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'client';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Client';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Client';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'client.id';

    /**
     * the column name for the fullname field
     */
    const COL_FULLNAME = 'client.fullname';

    /**
     * the column name for the adds field
     */
    const COL_ADDS = 'client.adds';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'client.phone';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'client.product_id';

    /**
     * the column name for the user_adv field
     */
    const COL_USER_ADV = 'client.user_adv';

    /**
     * the column name for the user_scan field
     */
    const COL_USER_SCAN = 'client.user_scan';

    /**
     * the column name for the time_create field
     */
    const COL_TIME_CREATE = 'client.time_create';

    /**
     * the column name for the time_approve field
     */
    const COL_TIME_APPROVE = 'client.time_approve';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'client.status';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'client.email';

    /**
     * the column name for the user_create field
     */
    const COL_USER_CREATE = 'client.user_create';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Fullname', 'Adds', 'Phone', 'ProductId', 'UserAdv', 'UserScan', 'TimeCreate', 'TimeApprove', 'Status', 'Email', 'UserCreate', ),
        self::TYPE_CAMELNAME     => array('id', 'fullname', 'adds', 'phone', 'productId', 'userAdv', 'userScan', 'timeCreate', 'timeApprove', 'status', 'email', 'userCreate', ),
        self::TYPE_COLNAME       => array(ClientTableMap::COL_ID, ClientTableMap::COL_FULLNAME, ClientTableMap::COL_ADDS, ClientTableMap::COL_PHONE, ClientTableMap::COL_PRODUCT_ID, ClientTableMap::COL_USER_ADV, ClientTableMap::COL_USER_SCAN, ClientTableMap::COL_TIME_CREATE, ClientTableMap::COL_TIME_APPROVE, ClientTableMap::COL_STATUS, ClientTableMap::COL_EMAIL, ClientTableMap::COL_USER_CREATE, ),
        self::TYPE_FIELDNAME     => array('id', 'fullname', 'adds', 'phone', 'product_id', 'user_adv', 'user_scan', 'time_create', 'time_approve', 'status', 'email', 'user_create', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Fullname' => 1, 'Adds' => 2, 'Phone' => 3, 'ProductId' => 4, 'UserAdv' => 5, 'UserScan' => 6, 'TimeCreate' => 7, 'TimeApprove' => 8, 'Status' => 9, 'Email' => 10, 'UserCreate' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'fullname' => 1, 'adds' => 2, 'phone' => 3, 'productId' => 4, 'userAdv' => 5, 'userScan' => 6, 'timeCreate' => 7, 'timeApprove' => 8, 'status' => 9, 'email' => 10, 'userCreate' => 11, ),
        self::TYPE_COLNAME       => array(ClientTableMap::COL_ID => 0, ClientTableMap::COL_FULLNAME => 1, ClientTableMap::COL_ADDS => 2, ClientTableMap::COL_PHONE => 3, ClientTableMap::COL_PRODUCT_ID => 4, ClientTableMap::COL_USER_ADV => 5, ClientTableMap::COL_USER_SCAN => 6, ClientTableMap::COL_TIME_CREATE => 7, ClientTableMap::COL_TIME_APPROVE => 8, ClientTableMap::COL_STATUS => 9, ClientTableMap::COL_EMAIL => 10, ClientTableMap::COL_USER_CREATE => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'fullname' => 1, 'adds' => 2, 'phone' => 3, 'product_id' => 4, 'user_adv' => 5, 'user_scan' => 6, 'time_create' => 7, 'time_approve' => 8, 'status' => 9, 'email' => 10, 'user_create' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('client');
        $this->setPhpName('Client');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Client');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('fullname', 'Fullname', 'VARCHAR', true, 200, null);
        $this->addColumn('adds', 'Adds', 'VARCHAR', true, 300, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 20, null);
        $this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addColumn('user_adv', 'UserAdv', 'INTEGER', true, null, null);
        $this->addColumn('user_scan', 'UserScan', 'INTEGER', true, null, null);
        $this->addColumn('time_create', 'TimeCreate', 'TIMESTAMP', false, null, null);
        $this->addColumn('time_approve', 'TimeApprove', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 20, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 200, null);
        $this->addColumn('user_create', 'UserCreate', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ClientTableMap::CLASS_DEFAULT : ClientTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Client object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClientTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClientTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClientTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientTableMap::OM_CLASS;
            /** @var Client $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClientTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ClientTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClientTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Client $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ClientTableMap::COL_ID);
            $criteria->addSelectColumn(ClientTableMap::COL_FULLNAME);
            $criteria->addSelectColumn(ClientTableMap::COL_ADDS);
            $criteria->addSelectColumn(ClientTableMap::COL_PHONE);
            $criteria->addSelectColumn(ClientTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(ClientTableMap::COL_USER_ADV);
            $criteria->addSelectColumn(ClientTableMap::COL_USER_SCAN);
            $criteria->addSelectColumn(ClientTableMap::COL_TIME_CREATE);
            $criteria->addSelectColumn(ClientTableMap::COL_TIME_APPROVE);
            $criteria->addSelectColumn(ClientTableMap::COL_STATUS);
            $criteria->addSelectColumn(ClientTableMap::COL_EMAIL);
            $criteria->addSelectColumn(ClientTableMap::COL_USER_CREATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.fullname');
            $criteria->addSelectColumn($alias . '.adds');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.user_adv');
            $criteria->addSelectColumn($alias . '.user_scan');
            $criteria->addSelectColumn($alias . '.time_create');
            $criteria->addSelectColumn($alias . '.time_approve');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.user_create');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ClientTableMap::DATABASE_NAME)->getTable(ClientTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClientTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClientTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClientTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Client or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Client object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Client) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientTableMap::DATABASE_NAME);
            $criteria->add(ClientTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ClientQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClientTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClientTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the client table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClientQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Client or Criteria object.
     *
     * @param mixed               $criteria Criteria or Client object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Client object
        }

        if ($criteria->containsKey(ClientTableMap::COL_ID) && $criteria->keyContainsValue(ClientTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ClientQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClientTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClientTableMap::buildTableMap();
