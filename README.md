# Laravel logging package

## Installation

```
$ php artisan to-log:install
```

## Update assets

```
$ php artisan to-log:assets
```

## Usage

```
to_log()->file('log_file')->emergency('log message');
to_log()->file('log_file')->alert('log message');
to_log()->file('log_file')->critical('log message');
to_log()->file('log_file')->error('log message');
to_log()->file('log_file')->warning('log message');
to_log()->file('log_file')->notice('log message');
to_log()->file('log_file')->info('log message');
to_log()->file('log_file')->debug('log message');

try {

} catch (\Exception $e) {
    to_log()->file('log_file')->exception($e, 'log message');
}
```
# 
