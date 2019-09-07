# Proof of Concept for inheritanceless UnitTests

This is a proof of concept that shows a way to create Tests without having to extend TestCase.

## Why?

There are multiple reasons to be able to create tests that do not inherit from TesstCase

* Currently TestCase is integrated in the phpunit-package. Therefore when I create a class that extends TestCase the
whole package needs to be available. That means that the project using the TestCase is now bound to the dependencies
used by phpunit. Now it is also possible to use the scoped phar-file to remove this lmiitations but still the code
would be necessary for other toolchains (like static analyzers) to run.
* Being able to create Tests that are loosely coupled to PHPUnit would allow one to use PHPUnit as a testrunner even
for tests that are not using the PHPUnit-testing-framework. (Idea courtesy to @ocramius)

This PoC shows a way to use a small set of interfaces that can be used to create tests that can then be run by the
PHPUnit testrunner. This small set of interfaces and possibly traits can then be required in the project and whether the
actual implementation is then the PHAR-file or the composer-package is up to the user. But the dependencies for f.e.
static analyzers are all met.

## How?

The interface UnitTest defines multiple methods:

* A static method `getTestMethods` that returns the names of the methods that shall be run as tests. This allows to
define the test-methods explicitly without needing magic and convention. The actual implementation of the method still
allows usage of convention but it is easy for the user to replace that with their own "magic"
* A constructor that takes the testcase-object as well as the name of the method to be run as test.
* `getName` to allow retrieval of the name of the method currently tested.
* A count method that always should return `1`
* A method `run` that calls the `run` method on the testcase-object give in the constructor

The last two methods are defined in the `Test`-Interface from PHPUnit.

## Limitations

The current code only allows running Tests. Currently no DataProviders are supported, no setup or teardown methods or
hooks. All these would require further modifications to the PHPUnit-Code.

Apart from getting the current features (setup/teardown, DataProvider, Hooks) into the PoC, a further possible
extension would be to modify the whole setup so that `getTestMethods` would not return methods but Closures that
are then used as Test-methods.

## Test it

You can test this PoC by checking out the code, installing the dependencies and then run the "testsuite"

```bash
git clone https://github.com/heiglandreas/phpunitstub.git
composer install
./vendor/bin/phpunit
```

It uses [a forked branch](https://github.com/sebastianbergmann/phpunit/compare/master...heiglandreas:pocTestCaseLessUnitTest)
of PHPUnit that has some modifications to make the PoC work.