/**
     * @OA\Get(   // from OA we start as it is open annotation . Get meann it is a post request
     *     path="/transaction/ies/{transaction}",   // what wull be the path shown at the api when we see our swagger paage
     *     tags={"IesTransaction"},    // tags is used to group the api calls. like the iesTransaction tags will be under one heading of IesTransaction
     *     summary="GET: /transaction/ies/{transaction}",   // summary of it just written ahead of the route 
     *     description="Get a transaction",  // description of this api 
     *     operationId="Transaction/Get",  // just for debugging later 
     *     security={{"bearerAuth":{}}},  // this tells that this route is portected so you need to give bearer token to access this route . we define this doc file that is generated like
<!--   "securitySchemes": {
            "bearerAuth": {
                "type": "http",
                "name": "bearerAuth",
                "in": "header",
                "bearerFormat": "JWT",
                "scheme": "bearer"
            }
        } -->
     *
     *     @OA\Parameter(    // we define that this route need a parameter 
     *      name="transaction",  // name is transaction of route param
     *      required=true, // it is missed 
     *      in="path",
     *
     *      @OA\Schema(     //scheme is we define structure of object
     *         type="string", // the route parma is string 
     *       )
     *      ),
     *
     *      @OA\Response(   // what will the output of this api
     *      response=200,  // it will have reponse 200
     *      description="Successful Response",  
     *
     *      @OA\MediaType(
     *          mediaType="application/json",  // the type of response, we can define multiple
     *
     *          @OA\Schema(ref="#/components/schemas/HttpSuccessResponseObjectOfIesTransaction"),  // we can define HttpSuccessResponseObjectOfIesTransaction else where in the code and can link here as structure 
     *      ),
     *     ),
     *  // we can define multiple responses, here like what will be strucuter for 200, 400 and other reponses
     *     @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *
     *      @OA\MediaType(
     *          mediaType="application/json",
     *
     *          @OA\Schema(ref="#/components/schemas/HttpErrorResponseObjectOfBadRequest"),
     *      ),
     *     ),
     *
     *     @OA\Response(
     *      response=404,
     *      description="Not found",
     *
     *      @OA\MediaType(
     *          mediaType="application/json",
     *
     *          @OA\Schema(ref="#/components/schemas/HttpErrorResponseObjectOfResult"),
     *      ),
     *     ),
     * )
     */
    public function show(string $transaction): Response
    {
       

        return new Response($response->toArray(), $response->getStatus());
    }

/**
     * @OA\Post(
     *     path="/transaction/ies/",
     *     tags={"IesTransaction"},
     *     summary="POST: /transaction/ies/",
     *     description="Create  a ies Trensaction",
     *     operationId="IesTransaction/Create",
     *     security={{"bearerAuth":{}}},
     *
     *     @OA\RequestBody(  // what this api need as body 
     *      request="parameters",
     *      required=true,
     *
     *      @OA\MediaType(
     *          mediaType="application/json",
     *
     *          @OA\Schema(ref="#/components/schemas/HttpRequestObjectOfCreateIesTransaction"),   // this ref is basially its file api-docs.json in storage folder and there there will be akey named as HttpRequestObjectOfCreateIesTransaction
     *      ),
     *     ),
     *
     *      @OA\Response(
     *      response=200,
     *      description="Successful Response",
     *
     *      @OA\MediaType(
     *          mediaType="application/json",
     *
     *          @OA\Schema(ref="#/components/schemas/HttpSuccessResponseObjectOfIesTransaction"),
     *      ),
     *     ),
     *
     *     @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *
     *      @OA\MediaType(
     *          mediaType="application/json",
     *
     *          @OA\Schema(ref="#/components/schemas/HttpErrorResponseObjectOfResult"),
     *      ),
     *     ),
     *
     *     @OA\Response(
     *      response=404,
     *      description="Not found",
     *
     *      @OA\MediaType(
     *          mediaType="application/json",
     *
     *          @OA\Schema(ref="#/components/schemas/HttpErrorResponseObjectOfResult"),
     *      ),
     *     ),
     * )
     */
    public function store(StoreTransactionRequest $request): Response
    {
        return new Response($response->toArray(), $response->getStatus());
    }











/* as we have written the controller docs and we linked some schemas .. when the swagger command runs it check all files and one that is defining a schemas are registered as scheme in the main 

Use @OA\Schema when you need to define and reuse a complex data type or object across multiple parts of your API documentation.
@OA\Items is used within an @OA\Schema to describe the elements of an array property. It specifies the schema of each item in the array.like
   @OA\Property(
 *         property="users",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/User")
 *     )

Use @OA\JsonContent when you want to specify the JSON structure directly within an operation, parameter, or response without needing a separate schema definition.. instead of schema and array we can use that 
like
*     @OA\Response(
 *         response=201,
 *         description="User created",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer"),
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="email", type="string"),
 *             @OA\Property(property="createdAt", type="string", format="date-time"),
 *             @OA\Property(property="updatedAt", type="string", format="date-time")
 *         )
 *     )


since we have referenced a schme above so it can be like that .. a class.that swagger will find all the schemas class and write it to itself and later can reference it to other who demands
<?php

namespace App\Transformers\RequestObjects\IesTransactionRequestObject;

/**
 * Class HttpRequestObjectOfCreateIesTransaction
 *
 * @OA\Schema(   // this tells i am a schme with title this so can be refernced later
 *     title="HttpRequestObjectOfCreateIesTransaction",
 *     type="object",
 *     description="HttpRequestObjectOfCreateIesTransaction object",
 *
 *     @OA\Xml(
 *         name="HttpRequestObjectOfCreateIesTransaction"
 *     )
 * )
 */
class HttpRequestObjectOfCreateIesTransaction
{
    /**
     * @OA\Property(  // we define a prporty with this 
     *     property="transactionType", // property name
     *     type="string", // type of property
     *     example="deposit" //what wil be example value shown at the api test page
     * )
     */
    public string $transactionType;

    /**
     * @OA\Property(
     *     property="accountType",
     *     type="string",
     *     example="currentAccount"
     * )
     */
    public string $accountType;

    /**
     * @OA\Property(
     *     property="accountId",
     *     description="ID of the account",
     *     type="string",
     *     format="uuid", // whats the fromat of this data
     *     example="123e4567-e89b-12d3-a456-426614174000",
     *     nullable=true  // it can be null
     * )
     */
    public ?string $accountId;

    /**
     * @OA\Property(
     *     property="supplierId",
     *     type="string",
     *     description="ID of the supplier",
     *     format="uuid",
     *     example="123e4567-e89b-12d3-a456-426614174001",
     *     nullable=true
     * )
     */
    public ?string $supplierId;

    /**
     * @OA\Property(
     *     property="customerId",
     *     type="string",
     *     description="ID of the customer",
     *     format="uuid",
     *     example="123e4567-e89b-12d3-a456-426614174002"
     * )
     */
    public string $customerId;

    /**
     * @OA\Property(
     *     type="string",
     *     property="payeeName",
     *     description="Name of the payee",
     *     maxLength=255,
     *     example="John Doe"
     * )
     */
    public string $payeeName;

    /**
     * @OA\Property(
     *     property="payeeAccountNumber",
     *     type="string",
     *     description="Account number of the payee",
     *     maxLength=255,
     *     example="123456789",
     *     nullable=true
     * )
     */
    public ?string $payeeAccountNumber;

    /**
     * @OA\Property(
     *     property="amount",
     *     type="int",
     *     description="Amount of the transaction",
     *     minimum=0,
     *     example=1000
     * )
     */
    public int $amount;

    /**
     * @OA\Property(
     *     property="expense",
     *     type="int",
     *     description="Expense amount",
     *     minimum=0,
     *     example=100,
     *     nullable=true
     * )
     */
    public ?int $expense;

    /**
     * @OA\Property(
     *     property="description",
     *     type="string",
     *     description="Description of the transaction",
     *     maxLength=255,
     *     example="Payment for services",
     *     nullable=true
     * )
     */
    public ?string $description;

    /**
     * @OA\Property(
     *     property="status",
     *     type="string",
     *     description="Status of the transaction",
     *     enum={"approved", "rejected", "pending", "returned"},
     *     example="approved"
     * )
     */
    public string $status;

    /**
     * @OA\Property(
     *     type="string",
     *     property="transactionDate",
     *     description="Transaction date",
     *     format="date",
     *     example="2024-07-08",
     *     nullable=true
     * )
     */
    public ?string $transactionDate;

    /**
     * @OA\Property(
     *     type="string",
     *     property="actionDate",
     *     description="Action date",
     *     format="date",
     *     example="2024-07-09",
     *     nullable=true
     * )
     */
    public ?string $actionDate;

    /**
     * @OA\Property(
     *     type="string",
     *     property="actionBy",
     *     description="ID of the user performing the action",
     *     format="uuid",
     *     example="123e4567-e89b-12d3-a456-426614174003",
     *     nullable=true
     * )
     */
    public ?string $actionBy;
}


we define a schema like this it basically its name that can be later used to reference it somewhere else . it contains properties and each porpery can have its name example value and rules etc
/**
 * @OA\Schema(
 *     schema="User",
 *     title="User",
 *     description="User object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", format="int64"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string", format="email"),
 *     @OA\Property(property="age", type="integer", format="int32"),
 * )
 */





