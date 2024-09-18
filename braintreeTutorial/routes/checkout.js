
const express = require('express');

// const dotenv = require('dotenv').config({path: '../.env'});

// if (dotenv.error) {
//     console.error('Errore nel caricamento di dotenv:', dotenv.error);
//     }


const router = express.Router();
const braintree = require('braintree');

//! log di testing dell'applicazione
// console.log(process.env.BRAINTREE_MERCHANT_ID);
// console.log(process.env.BRAINTREE_PUBLIC_KEY);
// console.log(process.env.BRAINTREE_PRIVATE_KEY);


router.post('/', (req, res, next) => {

    const gateway = new braintree.BraintreeGateway({
        environment: braintree.Environment.Sandbox,

        merchantId: process.env.BRAINTREE_MERCHANT_ID,
        publicKey:  process.env.BRAINTREE_PUBLIC_KEY,
        privateKey: process.env.BRAINTREE_PRIVATE_KEY
    });

    // Use the payment method nonce here
    const nonceFromTheClient = req.body.paymentMethodNonce;

    // Create a new transaction for $10
    const newTransaction = gateway.transaction.sale({
    amount: '10.00',
    paymentMethodNonce: nonceFromTheClient,
    options: {
        submitForSettlement: true
    }
        }, (error, result) => {
                if (error) {
                    console.error('Errore nella transazione:', error);
                    res.status(500).send({ error: 'Errore nella transazione', details: error });
                } else if (result.success) {
                    res.send(result);
                    console.log('Transazione riuscita:', result.transaction.status);
                } else {
                    console.log('Transazione fallita:', result.message);
                    res.status(500).send({ error: result.message });
                }
    });
});

module.exports = router;
