<?php

namespace Base;

use \Client as ChildClient;
use \ClientQuery as ChildClientQuery;
use \Exception;
use \PDO;
use Map\ClientTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'client' table.
 *
 *
 *
 * @method     ChildClientQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildClientQuery orderByFullname($order = Criteria::ASC) Order by the fullname column
 * @method     ChildClientQuery orderByAdds($order = Criteria::ASC) Order by the adds column
 * @method     ChildClientQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildClientQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildClientQuery orderByUserAdv($order = Criteria::ASC) Order by the user_adv column
 * @method     ChildClientQuery orderByUserScan($order = Criteria::ASC) Order by the user_scan column
 * @method     ChildClientQuery orderByTimeCreate($order = Criteria::ASC) Order by the time_create column
 * @method     ChildClientQuery orderByTimeApprove($order = Criteria::ASC) Order by the time_approve column
 * @method     ChildClientQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildClientQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildClientQuery orderByUserCreate($order = Criteria::ASC) Order by the user_create column
 *
 * @method     ChildClientQuery groupById() Group by the id column
 * @method     ChildClientQuery groupByFullname() Group by the fullname column
 * @method     ChildClientQuery groupByAdds() Group by the adds column
 * @method     ChildClientQuery groupByPhone() Group by the phone column
 * @method     ChildClientQuery groupByProductId() Group by the product_id column
 * @method     ChildClientQuery groupByUserAdv() Group by the user_adv column
 * @method     ChildClientQuery groupByUserScan() Group by the user_scan column
 * @method     ChildClientQuery groupByTimeCreate() Group by the time_create column
 * @method     ChildClientQuery groupByTimeApprove() Group by the time_approve column
 * @method     ChildClientQuery groupByStatus() Group by the status column
 * @method     ChildClientQuery groupByEmail() Group by the email column
 * @method     ChildClientQuery groupByUserCreate() Group by the user_create column
 *
 * @method     ChildClientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClientQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClientQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClientQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClient findOne(ConnectionInterface $con = null) Return the first ChildClient matching the query
 * @method     ChildClient findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClient matching the query, or a new ChildClient object populated from the query conditions when no match is found
 *
 * @method     ChildClient findOneById(int $id) Return the first ChildClient filtered by the id column
 * @method     ChildClient findOneByFullname(string $fullname) Return the first ChildClient filtered by the fullname column
 * @method     ChildClient findOneByAdds(string $adds) Return the first ChildClient filtered by the adds column
 * @method     ChildClient findOneByPhone(string $phone) Return the first ChildClient filtered by the phone column
 * @method     ChildClient findOneByProductId(int $product_id) Return the first ChildClient filtered by the product_id column
 * @method     ChildClient findOneByUserAdv(int $user_adv) Return the first ChildClient filtered by the user_adv column
 * @method     ChildClient findOneByUserScan(int $user_scan) Return the first ChildClient filtered by the user_scan column
 * @method     ChildClient findOneByTimeCreate(string $time_create) Return the first ChildClient filtered by the time_create column
 * @method     ChildClient findOneByTimeApprove(string $time_approve) Return the first ChildClient filtered by the time_approve column
 * @method     ChildClient findOneByStatus(string $status) Return the first ChildClient filtered by the status column
 * @method     ChildClient findOneByEmail(string $email) Return the first ChildClient filtered by the email column
 * @method     ChildClient findOneByUserCreate(int $user_create) Return the first ChildClient filtered by the user_create column *

 * @method     ChildClient requirePk($key, ConnectionInterface $con = null) Return the ChildClient by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOne(ConnectionInterface $con = null) Return the first ChildClient matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClient requireOneById(int $id) Return the first ChildClient filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByFullname(string $fullname) Return the first ChildClient filtered by the fullname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByAdds(string $adds) Return the first ChildClient filtered by the adds column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByPhone(string $phone) Return the first ChildClient filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByProductId(int $product_id) Return the first ChildClient filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByUserAdv(int $user_adv) Return the first ChildClient filtered by the user_adv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByUserScan(int $user_scan) Return the first ChildClient filtered by the user_scan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByTimeCreate(string $time_create) Return the first ChildClient filtered by the time_create column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByTimeApprove(string $time_approve) Return the first ChildClient filtered by the time_approve column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByStatus(string $status) Return the first ChildClient filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByEmail(string $email) Return the first ChildClient filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByUserCreate(int $user_create) Return the first ChildClient filtered by the user_create column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClient[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClient objects based on current ModelCriteria
 * @method     ChildClient[]|ObjectCollection findById(int $id) Return ChildClient objects filtered by the id column
 * @method     ChildClient[]|ObjectCollection findByFullname(string $fullname) Return ChildClient objects filtered by the fullname column
 * @method     ChildClient[]|ObjectCollection findByAdds(string $adds) Return ChildClient objects filtered by the adds column
 * @method     ChildClient[]|ObjectCollection findByPhone(string $phone) Return ChildClient objects filtered by the phone column
 * @method     ChildClient[]|ObjectCollection findByProductId(int $product_id) Return ChildClient objects filtered by the product_id column
 * @method     ChildClient[]|ObjectCollection findByUserAdv(int $user_adv) Return ChildClient objects filtered by the user_adv column
 * @method     ChildClient[]|ObjectCollection findByUserScan(int $user_scan) Return ChildClient objects filtered by the user_scan column
 * @method     ChildClient[]|ObjectCollection findByTimeCreate(string $time_create) Return ChildClient objects filtered by the time_create column
 * @method     ChildClient[]|ObjectCollection findByTimeApprove(string $time_approve) Return ChildClient objects filtered by the time_approve column
 * @method     ChildClient[]|ObjectCollection findByStatus(string $status) Return ChildClient objects filtered by the status column
 * @method     ChildClient[]|ObjectCollection findByEmail(string $email) Return ChildClient objects filtered by the email column
 * @method     ChildClient[]|ObjectCollection findByUserCreate(int $user_create) Return ChildClient objects filtered by the user_create column
 * @method     ChildClient[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClientQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ClientQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Client', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClientQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClientQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClientQuery) {
            return $criteria;
        }
        $query = new ChildClientQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildClient|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClientTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ClientTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClient A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, fullname, adds, phone, product_id, user_adv, user_scan, time_create, time_approve, status, email, user_create FROM client WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildClient $obj */
            $obj = new ChildClient();
            $obj->hydrate($row);
            ClientTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildClient|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the fullname column
     *
     * Example usage:
     * <code>
     * $query->filterByFullname('fooValue');   // WHERE fullname = 'fooValue'
     * $query->filterByFullname('%fooValue%'); // WHERE fullname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fullname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByFullname($fullname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fullname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_FULLNAME, $fullname, $comparison);
    }

    /**
     * Filter the query on the adds column
     *
     * Example usage:
     * <code>
     * $query->filterByAdds('fooValue');   // WHERE adds = 'fooValue'
     * $query->filterByAdds('%fooValue%'); // WHERE adds LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adds The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByAdds($adds = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adds)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_ADDS, $adds, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the user_adv column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAdv(1234); // WHERE user_adv = 1234
     * $query->filterByUserAdv(array(12, 34)); // WHERE user_adv IN (12, 34)
     * $query->filterByUserAdv(array('min' => 12)); // WHERE user_adv > 12
     * </code>
     *
     * @param     mixed $userAdv The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByUserAdv($userAdv = null, $comparison = null)
    {
        if (is_array($userAdv)) {
            $useMinMax = false;
            if (isset($userAdv['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_ADV, $userAdv['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userAdv['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_ADV, $userAdv['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_USER_ADV, $userAdv, $comparison);
    }

    /**
     * Filter the query on the user_scan column
     *
     * Example usage:
     * <code>
     * $query->filterByUserScan(1234); // WHERE user_scan = 1234
     * $query->filterByUserScan(array(12, 34)); // WHERE user_scan IN (12, 34)
     * $query->filterByUserScan(array('min' => 12)); // WHERE user_scan > 12
     * </code>
     *
     * @param     mixed $userScan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByUserScan($userScan = null, $comparison = null)
    {
        if (is_array($userScan)) {
            $useMinMax = false;
            if (isset($userScan['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_SCAN, $userScan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userScan['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_SCAN, $userScan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_USER_SCAN, $userScan, $comparison);
    }

    /**
     * Filter the query on the time_create column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeCreate('2011-03-14'); // WHERE time_create = '2011-03-14'
     * $query->filterByTimeCreate('now'); // WHERE time_create = '2011-03-14'
     * $query->filterByTimeCreate(array('max' => 'yesterday')); // WHERE time_create > '2011-03-13'
     * </code>
     *
     * @param     mixed $timeCreate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByTimeCreate($timeCreate = null, $comparison = null)
    {
        if (is_array($timeCreate)) {
            $useMinMax = false;
            if (isset($timeCreate['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_TIME_CREATE, $timeCreate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeCreate['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_TIME_CREATE, $timeCreate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_TIME_CREATE, $timeCreate, $comparison);
    }

    /**
     * Filter the query on the time_approve column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeApprove('2011-03-14'); // WHERE time_approve = '2011-03-14'
     * $query->filterByTimeApprove('now'); // WHERE time_approve = '2011-03-14'
     * $query->filterByTimeApprove(array('max' => 'yesterday')); // WHERE time_approve > '2011-03-13'
     * </code>
     *
     * @param     mixed $timeApprove The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByTimeApprove($timeApprove = null, $comparison = null)
    {
        if (is_array($timeApprove)) {
            $useMinMax = false;
            if (isset($timeApprove['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_TIME_APPROVE, $timeApprove['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeApprove['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_TIME_APPROVE, $timeApprove['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_TIME_APPROVE, $timeApprove, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the user_create column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCreate(1234); // WHERE user_create = 1234
     * $query->filterByUserCreate(array(12, 34)); // WHERE user_create IN (12, 34)
     * $query->filterByUserCreate(array('min' => 12)); // WHERE user_create > 12
     * </code>
     *
     * @param     mixed $userCreate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByUserCreate($userCreate = null, $comparison = null)
    {
        if (is_array($userCreate)) {
            $useMinMax = false;
            if (isset($userCreate['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_CREATE, $userCreate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userCreate['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_CREATE, $userCreate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_USER_CREATE, $userCreate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildClient $client Object to remove from the list of results
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function prune($client = null)
    {
        if ($client) {
            $this->addUsingAlias(ClientTableMap::COL_ID, $client->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the client table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientTableMap::clearInstancePool();
            ClientTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClientTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClientTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClientTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClientQuery
