# *** Application Briefing ***

Management needs an application where they can aggregate statistics from the given data sources.
You are one of the developers in tech team and your part is to create the following:

## 1 Get data by request

- show all transactions for the selected user along with information about the user (status and country)
- group results by transaction type (i.e. transactions for each type are showed in separate tab, table, etc.)

## 2 Create a new data sources for other developers in your team for further processing

- sum and count of transactions per country for all time
- sum and count of transactions per user, month by month

### Output formats for new data sources (please choose two of the following):

- new DB table
- new API endpoint
- new CSV file

# *** Development Requirements ***

- use OOP features
- follow best practices (scalability, errors, programming standards, data format, etc.)
- styling is not required (simple view for input and output is enough)
- make it from scratch (no frameworks please)

# *** Data Sources ***

## 1 Database

- complete dump is provided (condor.sql)

## 2 API

- API endpoint: https://pinkman.online/api/
- API query parameters:
    - param name: api-key
    - param value: any
