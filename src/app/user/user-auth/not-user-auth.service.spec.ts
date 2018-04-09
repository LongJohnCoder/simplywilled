import { TestBed, inject } from '@angular/core/testing';

import { NotUserAuthService } from './not-user-auth.service';

describe('NotUserAuthService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [NotUserAuthService]
    });
  });

  it('should be created', inject([NotUserAuthService], (service: NotUserAuthService) => {
    expect(service).toBeTruthy();
  }));
});
