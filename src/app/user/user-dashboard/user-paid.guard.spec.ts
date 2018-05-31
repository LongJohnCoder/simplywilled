import { TestBed, async, inject } from '@angular/core/testing';

import { UserPaidGuard } from './user-paid.guard';

describe('UserPaidGuard', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserPaidGuard]
    });
  });

  it('should ...', inject([UserPaidGuard], (guard: UserPaidGuard) => {
    expect(guard).toBeTruthy();
  }));
});
