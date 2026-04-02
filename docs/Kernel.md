## Kernel Tool Definition

### Overview

The kernel tool is responsible for managing the application's HTTP middleware, middleware groups, and middleware aliases.

### Middleware

#### Global HTTP Middleware Stack

The global HTTP middleware stack is an array of middleware classes that are executed during every request to the application. The following middleware are included in the global stack by default:

| Middleware | Class Name | Description |
| --- | --- | --- |
| Trust Proxies | `\App\Http\Middleware\TrustProxies` | Trusts proxy servers |
| CORS Middleware | `\Illuminate\Http\Middleware\HandleCors` | Handles CORS requests |
| Prevent Requests During Maintenance | `\App\Http\Middleware\PreventRequestsDuringMaintenance` | Prevents requests during maintenance mode |
| Validate Post Size | `\Illuminate\Foundation\Http\Middleware\ValidatePostSize` | Validates post size |
| Trim Strings | `\App\Http\Middleware\TrimStrings` | Trims strings |
| Convert Empty Strings to Null | `\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull` | Converts empty strings to null |

#### Middleware Groups

The middleware groups are an array of middleware groups that can be assigned to routes or groups. The following middleware groups are defined:

| Group | Middleware |
| --- | --- |
| web | `EncryptCookies`, `AddQueuedCookiesToResponse`, `StartSession`, `ShareErrorsFromSession`, `VerifyCsrfToken`, `SubstituteBindings` |
| api | `ThrottleRequests`, `SubstituteBindings` |

#### Middleware Aliases

The middleware aliases are an array of middleware aliases that can be used instead of class names to assign middleware to routes or groups. The following middleware aliases are defined:

| Alias | Class Name | Description |
| --- | --- | --- |
| auth | `\App\Http\Middleware\Authenticate` | Authenticates users |
| auth.basic | `\Illuminate\Auth\Middleware\AuthenticateWithBasicAuth` | Authenticates users with basic authentication |
| auth.session | `\Illuminate\Session\Middleware\AuthenticateSession` | Authenticates users with session authentication |
| cache.headers | `\Illuminate\Http\Middleware\SetCacheHeaders` | Sets cache headers |
| can | `\Illuminate\Auth\Middleware\Authorize` | Authorizes users based on permissions |
| guest | `\App\Http\Middleware\RedirectIfAuthenticated` | Redirects authenticated users |
| password.confirm | `\Illuminate\Auth\Middleware\RequirePassword` | Requires password confirmation |
| precognitive | `\Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests` | Handles Precognitive requests |
| signed | `\App\Http\Middleware\ValidateSignature` | Validates signatures |
| throttle | `\Illuminate\Routing\Middleware\ThrottleRequests` | Throttles requests |
| verified | `\Illuminate\Auth\Middleware\EnsureEmailIsVerified` | Ensures email is verified |

### Configuration

The kernel configuration can be customized by modifying the `middleware`, `middlewareGroups`, and `middlewareAliases` properties.