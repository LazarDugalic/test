__Kameo__ is crowdlending platform based on eZ Publish.

### Links

* stage:
    - [Default (Svensk) Backoffice](https://stage.kameo.se/admin)
    - [Default (Svensk) Website](https://stage.kameo.se/)
    - [Norsk Backoffice](https://stage.kameo.se/admin_no)
    - [Norsk Website](https://stage.kameo.se/no)
    - [Svensk Backoffice](https://stage.kameo.se/admin_se)
    - [Svensk Website](https://stage.kameo.se/se)
    - [Svensk Website (v1)](https://stage.kameo.se/v1)
    - [HTML/CSS](https://stage.kameo.se/html/)
    - [Concept](https://stage.kameo.se/concept/)

* prod:
    - [Norsk Backoffice](https://www.kameo.se/admin_no)
    - [Norsk Website](https://www.kameo.se/no)
    - [Svensk Backoffice](https://www.kameo.se/admin_se)
    - [Svensk Website](https://www.kameo.se/se)

### Non-codebase updates
* 2020-03-10 @notification-email-throttling-fix
    * import sql/mysql/tmp_notification_email_throttling_fix.sql
    * make new `MaxRetries`, `BatchTimeoutInSeconds` and `BatchChunkSize` entries for `[MailSettings]` group in site.ini from sample files and those have to be applied to all environments.
* 2020-02-03 @outgoing-payments-v2  
    * import sql/mysql/tmp_outgoing_payments_v2_fix.sql
* 2020-01-31 @notification-bid-cronjob-fix
    * import sql/mysql/tmp_notification_bid_cronjob_fix.sql
    * moved sendemail notification cronjob to kameo-bids cronjob group for more verbose using below additional param option.
    * update existing entry for cronjob group kameo-bids in crontab file with [--logfiles](dist/ezpublish.cron.example) option.
* 2019-12-11 @dic  
    `composer require php-di/php-di:5.4.6`
* 2029-12-10 @nordea-clearing-fix
    * run [script](extension/kameo/scripts/updatenordeabankclearing.php) `php extension/kameo/scripts/updatenordeabankclearing.php`
* 2019-12-04 @exchange-rate-fetch-update
    * import sql/mysql/tmp_exchange-rate-fetch-update.sql
* 2019-11-14 @outgoing-payments
    * import sql/mysql/tmp_inbound_outgoing_payments_fix.sql
    * run [script](extension/kameo/scripts/fixinboundtxnsfilemessageidentifier.php) `php extension/kameo/scripts/fixinboundtxnsfilemessageidentifier.php`
* 2019-11-13 @feed-disbursement-date-fix
    * run [script](extension/kameo/scripts/populatelegacydisbursementdates.php) `php extension/kameo/scripts/populatelegacydisbursementdates.php`
* 2019-11-11 @bond-ownership-transfer-fix
    * import sql/mysql/tmp_bond_ownership_transfer_fix.sql
    * run [script](extension/kameo/scripts/addsettlementdate.php) `php extension/kameo/scripts/addsettlementdate.php`
    * bond summary struct changed, clear tedivm-stash cache `rm -rf var/kameo/cache/tedivm-stash/`
* 2019-10-28 @auto-distribution
    * php.ini max_input_vars = 3000
* 2019-09-25 @outgoing-payments
    * import sql/mysql/tmp_outgoing_payments.sql
    * make new `UploadDirectory` entry for `[kameo_dnb_sftp]` group in site.ini from sample files and those have to be applied to all environments.
    * add `[EncryptDecryptSettings]` block to site.ini from sample files and those have to be applied to all environments.
* 2019-09-25 @bond-ownership-transfer-mladen
    * import sql/mysql/tmp_bond_ownership_transfer_mladen.sql
* 2019-09-17 @elmer-risk-ratings
    * import sql/mysql/tmp_risk_ratings.sql
    * add images `underwriterlogo_se_long.png` & `underwriterlogo_no_long.png`
* 2019-09-11 @agreements-2.0-mladen
    * fix dependencies
    ```bash
    composer require knplabs/knp-snappy:0.4.3
    composer require h4cc/wkhtmltopdf-amd64:0.12.4
    composer require h4cc/wkhtmltoimage-amd64:0.12.4
    ```
* 2019-09-10 @agreements-2.0-mladen
    * import sql/mysql/kameobond_range_agreement_pages.sql
* 2019-09-06 @agreements-2.0-mladen
    * run `composer require setasign/fpdi-fpdf:1.6.2` or `composer require setasign/fpdi:1.6.2` and `composer require setasign/fpdf:1.8.1`
    * bond summary struct changed, clear tedivm-stash cache `rm -rf var/kameo/cache/tedivm-stash/`
* 2019-08-06 @agreements-2.0-mladen
    * add to Members policy list: content > read limited to agreement_template class and media section 
* 2019-05-22 @agreement-timestamps
    * add ezjscore/call/kameo_qa_deleteQuestion to Members policy list
* 2019-05-03 @deferred-payments
    * add ezjscore calls kameo_bidding_widget_load, kameo_bidding_widget_submit, kameo_bidding_widget_closeReminder to Members policy list
    * import sql/mysql/tmp_deferred_payments.sql
    * add to dev crontab: `*/5 * * * * cd /path/to/htdocs && php runcronjobs.php -q kameo-nightly 2>&1`
    * add to prod crontab: `58 23 * * * cd /path/to/htdocs && php runcronjobs.php -q kameo-nightly 2>&1`
* 2019-04-22 @c54c-support
    * import sql/mysql/tmp_c54c_support.sql
* 2019-03-11 @referral-token
    * import sql/mysql/tmp_referral_token.sql
* 2019-02-27 @loan-application-contact-request
    * import sql/mysql/tmp_loan_application_contact_request.sql
* 2019-02-20 @transfer-request-backoffice
    * import sql/mysql/tmp_transfer_request_backoffice.sql
* 2019-02-15 @user-customer-deletion
    * import sql/mysql/tmp_user_customer_deletion.sql
    * make new schedule entry for cronjob group [kameo-monthly](dist/ezpublish.cron.example) in crontab file
* 2018-12-19 @bank-integration
    * run `composer require phpseclib/phpseclib:~2.0`
    * import sql/mysql/tmp_bank_integration.sql
    * add `[BankIntegrationSettings]` and its groups to site.ini from sample files and those have to be applied to all environments.
    * run [ssh2 keygen commands](dist/dnb_bank_integration.example) to get DNB sFTP connection.
* 2018-12-11 @develop, @kameo-dk
    * make new entries for cronjob group kameo-frequent in crontab file: 
     `php runcronjobs.php -q -s [SITEACCESS] kameo-frequent 2>&1`
* 2018-11-15 @kameo-dk
    * run [script](extension/kameo/scripts/addexchangerateshistory.php)  `php extension/kameo/scripts/addexchangerateshistory.php`
* 2018-11-14 @develop, @kameo-dk
    * import admin package `insaettning_ta_ut_pengar_fraan_ditt_kameo_konto-1.0-1.ezpkg`
* 2018-11-08 @kameo-dk
    * add `SetEnv ENVIRONMENT "dev"` to apache conf then `sudo service apache2 reload`
    * add `[HttpBasicAuth]` block to site.ini on stage
    * import sql/mysql/tmp_kameo_dk.sql
* 2018-11-01 @kameo-dk
    * import sql/mysql/tmp_kameo_dk.sql
    * import sql/mysql/tmp_kameo_dk_transfer_function.sql
* 2018-10-29 @kameo-dk
    * update ezpublish-legacy/settings/override/site.ini.append.php using sample from dist
    * symlink new siteaccesses
    * symlink fixed locale
    * reload
    * update anonymous access policy to include new siteaccesses
    * add danish language to setup/languages
    * import danish KYC
    * import danish agreement templates package
* 2018-09-03 @allow-bids-frontend
    * add public holiday api settings to site.ini.sample files and those have to be applied to all environments.
    * add nok/sek loan application special case ImmediatePaymentOption settings to kameo.ini
* 2018-07-30 @agreements-2.0-mladen
    * execute: `composer require ramsey/uuid:3.8.0`
    * import sql/mysql/tmp_a2.sql
* 2017-11-30 @caching-investor-dashboard
    * add ezjscore/call/kameo_investor_dashboard_getInvestmentSummary to Members policy list
* 2017-11-28 @caching-investor-dashboard
    * execute: `composer require tedivm/stash:0.14.2`
* 2017-11-22 @notifications
    * import sql/mysql/tmp_notifications.sql
    * add ezjscore/call/kameo_admin_(getNewLoanEmailInvestorsCount|sendNewLoanTestEmail) to Members policy list
    * add swedish/norwegian mailchimp investor newsletter mailing list ids to kameo.ini and those have to be applied to all environments.
    * make new schedule entry for cronjob group kameo-bids in crontab file
    * there are additions(mailchimp api newsletter settings) to site.ini.sample files and those have to be applied to all environments.
* 2017-10-17 @historical-currency-rates
    * import sql/mysql/tmp_exchange_rates_history.sql
    * run [script](extension/kameo/scripts/addexchangerateshistory.php) `php extension/kameo/scripts/addexchangerateshistory.php`
* 2017-10-17 @uc-auto-prequalification
    * import sql/mysql/tmp_loanappscore_credit_rating.sql
* 2017-08-21 @transfer-function
    * import sql/mysql/tmp_transferfunction.sql
    * import sql/mysql/tmp_transfer_request.sql
    * add ezjscore/call/kameo_transfer_(init|create|update|cancel|getEstimate) to Members policy list
* 2017-08-15 @cb-release
    * create nok/sek promo pages on prod before deployment and add node id to kameo.ini
* 2017-07-28 @cb2-extended-signoff
    * import sql/mysql/tmp_extended_signoff.sql
    * run [update script](extension/kameo/scripts/update/extendingsignatoryrequirement.php) `php extension/kameo/scripts/update/extendingsignatoryrequirement.php`
* 2017-06-30 @cb0-new-account-number
    * backup db
    * import sql/mysql/tmp_customer_account.sql
    * run [update script](extension/kameo/scripts/update/customeraccount.php) `php extension/kameo/scripts/update/customeraccount.php`
    * run [update script](extension/kameo/scripts/update/customeraccount_bondpayables.php) `php extension/kameo/scripts/update/customeraccount_bondpayables.php`
    * run [update script](extension/kameo/scripts/update/customeraccount_bond.php) `php extension/kameo/scripts/update/customeraccount_bond.php`
    * run [update script](extension/kameo/scripts/update/customeraccount_marketorder.php) `php extension/kameo/scripts/update/customeraccount_marketorder.php`
    * run [update script](extension/kameo/scripts/update/customeraccount_withdrawalrequests.php) `php extension/kameo/scripts/update/customeraccount_withdrawalrequests.php`
* 2017-06-20 @cb2-deposits-and-withdrawals-page
    * add ezjscore/call/kameo_withdrawal_getSummary to Members policy list
* 2017-05-04 @develop
    * be aware that from now on copy-of-develop is merged back to develop
    * translation files SHOULD NOT be manually updated, ezlupdate is required
    * import both norsk and svensk kyc again
    * all custom siteaccesses but following five (kameo_admin_no, kameo_admin_se, kameo_v1_se, kameo_v2_no, kameo_v2_se) are considered discontinued and should be removed from ezpublish_legacy/settings/siteaccess
* 2017-05-03 @copy-of-develop
    * import sql/mysql/tmp_loanappscore_hash.sql
* 2017-03-22 @kameo-no
    * add "BankAccounts.DNB.15037437120" asset account to "Default NOK" ledger in backoffice
    * ~~add "PendingDisbursements" liability account to "Default NOK" ledger in backoffice~~ auto added
    * ~~add "KameoTrading" liability account to "Default NOK" ledger in backoffice~~ auto added
    * ~~add "Roundings" liability account to "Default NOK" ledger in backoffice~~ auto added
* 2017-03-15 @master 
    * check upon the merge of develop branch if kyc source file update is correctly applied to all newly added kyc source files https://github.com/ZwebbSweden/kameo-ls-extension/commit/80e1fd9568de9fabbcdf11ad5764418899657254    
* 2017-03-12 @kameo-no
    * all existing default ledgers must be renamed to "Default XXX" where XXX is currency code
* 2017-03-06 @copy-of-develop
    * check upon the merge of develop branch if bank account edit fix is correctly applied to all newly added templates https://github.com/ZwebbSweden/kameo-ls-extension/commit/9510bfccad9064531ba851a1aaba315039313125 
* 2017-02-02 @kameo-no
    * import norwegian kyc set
* 2017-01-24 @develop
Reminder: Just added quick reconfig of kameo-no to prod dist settings to allow preview of .no site translations. Make sure to undo it if required before merging kameo-no or copy-of-development to develop and master branch. Commits [1c8db70031aa8ce1fdc776923623892b028cf8f5](https://github.com/ZwebbSweden/kameo-ls-extension/commit/1c8db70031aa8ce1fdc776923623892b028cf8f5) amd [1b6c7c7c3c5876a695b0f24950ae230269b55d2d](https://github.com/ZwebbSweden/kameo-ls-extension/commit/1b6c7c7c3c5876a695b0f24950ae230269b55d2d).
* 2017-01-12 @kameo-no
    * run [update script](extension/kameo/scripts/update/loanapplicationcountrycode.php) `php extension/kameo/scripts/update/loanapplicationcountrycode.php`
* 2017-01-10 @kameo-no
    * link [norwegian locale fix](dist/nor-NO@fixed.ini) into htdocs/share/locale
    * create new links (kameo_admin_no, kameo_admin_se, kameo_v1_se, kameo_v2_no, kameo_v2_se) in [settings/siteaccess](settings/siteaccess) then run ./reload.sh, but also keep old links (kameo_se, kameo_se_admin) for backwards compatibility
    * update anonymous access policy in backoffice to match new siteaccesses
* 2016-12-20 @develop
    * import sql/mysql/tmp_loanapp_no.sql
* 2016-11-05 @incoming-payments
    * execute: `composer require doctrine/collections:^1.3`
    * create "Roundings" liability account on default SEK ledger in backoffice
    * import sql/mysql/tmp_incoming_payments.sql
