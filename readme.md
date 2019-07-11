1. Simple implementation of report system - now, only with console interface.
2. Now, it supports one face API, and 3 reports.
3. Components of system are reusable and system is extensible:
- You can use logic of implemented report for another data source API.
- You can get data for report not from single API
- You can change view of reports.
4. Little overview 
- All available reports you can see, run the "bin/console help" in root of project
- Run report bin/console {report_name} - for example - "bin/console average_length_post"
5. External components:
- my own simple Service Container and light Dependency Injection mechanism
- all configuration in app/config.php and app/params.php - it's services configuration and params;